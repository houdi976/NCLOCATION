<?php
require('connexion.php');
?>

<!doctype html>
<meta charset="utf-8">

<?php
try {
    if (isset($_GET['supCar'])) {
        $sup = (int) $_GET["supCar"];
        $reqDelete = "DELETE FROM automobile WHERE Immatriculation =" . $sup;
        $resultat = mysqli_query($cnnclocation, $reqDelete);

        if ($resultat) {
            echo "La suppression a été correctement effectuée <a href='accueil.php'>Tableau de Bord</a>";
        } else {
            throw new Exception("La suppression a échoué");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage() . " <a href='accueil.php'>Tableau de Bord</a>";
}
?>
