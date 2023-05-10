<?php require('connexion.php');?>
<!doctype html>

<meta charset="utf-8">
<?php
 
if (isset($_GET['supCar'])) {

	$sup=(int) ($_GET["supCar"]);
	
    $reqDelete="DELETE FROM automobile WHERE Immatriculation =".$sup;
	$resultat=mysqli_query($cnnclocation,$reqDelete);
	
    }
 
  if($reqDelete)
  {
    echo "La suppression a été correctement effectuée <a href='accueil.php'>Tableau de Bord</a>" ;
  }
  else
  {
    echo"La suppression à échouée <a href='accueil.php'>Tableau de Bord</a>" ;
  }
?>