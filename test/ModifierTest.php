<?php
require_once('./src/Connexion.php');

use PHPUnit\Framework\TestCase;

class ModifierTest extends TestCase
{ 
    

    public function testMiseAJourDesDonneesValidees()
    {
        function updateCar($imm, $marque, $prixloc, $photo, $cnnclocation) {
            // vérification de la présence de la photo
            if (!isset($photo) || $photo['error'] != UPLOAD_ERR_OK) {
                throw new Exception('La photo est obligatoire.');
            }
            
            // récupération et sauvegarde de la photo
            $image = $_FILES['txtphoto']['tmp_name'];
            $target = "./src/images/";
            if (!move_uploaded_file($image,$target)) {
                throw new Exception('Impossible de télécharger l\'image.');
            }
            // mise à jour des données dans la base de données
            $sql = "UPDATE automobile SET Marque = '$marque', Prix_Loc = '$prixloc' , Photo ='$target' WHERE Immatriculation ='$imm'";
            $resultat=mysqli_query($cnnclocation,$sql);
        
            if(!$resultat) {
                throw new Exception('Echec de modification des données !');
            }
            
            return "Mise a jour des données validés";
        }
        
        // créer une connexion à une base de données de test
        $cnnclocation = mysqli_connect("localhost", "root", "", "nclocation");

        // créer un fichier temporaire pour simuler l'upload de la photo
        $tmpfile = tmpfile();
        $photo = array(
            'name' => 'test.jpg',
            'type' => 'image/jpeg',
            'size' => 1000,
            'tmp_name' => $tmpfile,
            'error' => UPLOAD_ERR_OK
        );

        // exécuter la fonction à tester
        $result = updateCar('AB123CD', 'Toyota', 100, $photo, $cnnclocation);

        // vérifier que la mise à jour a réussi
        $this->assertEquals('Mise a jour des données validés', $result);
    }
}
    ?>
