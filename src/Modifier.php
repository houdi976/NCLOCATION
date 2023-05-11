<?php 
try {
require_once('connexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modifier Car</title>
<link rel="stylesheet" href="nclocation_style.css">

</head>

<body>


<div id="container">
	
	<form name="formadd" action="" method="post" class="formulaire" enctype="multipart/form-data">
		<h2 align="center">Mettre a Jour une  Voiture...</h2>
                
                <label><b>Immatriculation</b></label>
                <input class="zonetext" type="text" name="txtImm" value="<?php echo $_GET['mod'] ?>" >

                <label><b>Marque</b></label>
                <input class="zonetext" type="text" placeholder="Entrer la Marque" name="txtMarque" required>

               <label><b>Prix de Location </b></label>
                <input class="zonetext" type="text" placeholder="Entrer Prix de Location" name="txtPl" required>
                
                <label><b>Photo</b></label>
                <input class="zonetext" type="file" placeholder="choisir une photo" name="txtphoto" required>
                
                <input type="submit" id='submit' class="submit" name="btmod" value='Mettre a Jour' >
                
		<p><a href="accueil.php" class="submit" >Tableau de Bord</a></p>
                
                <label style="text-align: center;color: #360001;">
                	
                	<?php
if(isset($_POST['btmod'])) {
	// récupération des valeurs du formulaire
	$imm=$_POST['txtImm'];
	$marque=$_POST['txtMarque'];
	$prixloc=$_POST['txtPl'];

	// vérification de la présence de la photo
	if (!isset($_FILES['txtphoto']) || $_FILES['txtphoto']['error'] != UPLOAD_ERR_OK) {
		throw new Exception('La photo est obligatoire.');
	}

	// récupération et sauvegarde de la photo
	$image = $_FILES['txtphoto']['tmp_name'];
	$target = "images/".$_FILES['txtphoto']['name'];
	if (!move_uploaded_file($image,$target)) {
		throw new Exception('Impossible de télécharger l\'image.');
	}

	// mise à jour des données dans la base de données
	$stmt = $cnnclocation->prepare("UPDATE automobile SET Marque = ?, Prix_Loc = ?, Photo = ? WHERE Immatriculation = ?");
	$stmt->bind_param("ssss", $marque, $prixloc, $target, $imm);
	if (!$stmt->execute()) {
		throw new Exception('Echec de modification des données !');
	}

	echo "Mise a jour des données validés";

}
} catch (Exception $e) {
echo 'Erreur : ',  $e->getMessage();
}
  
		
		
	?>
                	
                	
                	
                </label>
	</form>
	
	
	
</div>



   
 
</body>
</html>