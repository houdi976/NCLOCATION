<?php require_once('connexion.php');?>
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
	if(isset($_POST['btmod']))
	{
		$imm=$_POST['txtImm'];
		$marque=$_POST['txtMarque'];
		$prixloc=$_POST['txtPl'];
		
		$modifier=(int) ($_GET["mod"]);
		
  	$image = $_FILES['txtphoto']['tmp_name'];
  	
		
  	$target = "images/".$_FILES['txtphoto']['name'];

		if (move_uploaded_file($image,$target)) {
  		$msg = "Image téléchargée avec succès";
  	}else{
  		$msg = "Impossible de télécharger l'image";
  	}
  	$sql = "UPDATE automobile SET Marque = '$marque', Prix_Loc = '$prixloc' , Photo ='$target' WHERE Immatriculation ='".$_GET["mod"]."'";
		$resultat=mysqli_query($cnnclocation,$sql);

if($resultat)
{
	echo "Mise a jour des données validés";
}else{
	echo "Echec de modification des données !";
}
  	
  }
  
		
		
	?>
                	
                	
                	
                </label>
	</form>
	
	
	
</div>



   
 
</body>
</html>