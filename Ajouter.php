<?php require_once('connexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="nclocation_style.css">

</head>

<body>
<div id="container">
	
	<form name="formadd" action="" method="post" class="formulaire" enctype="multipart/form-data">
		<h2 align="center">Ajouter Nouvelle Voiture...</h2>
                
                <label><b>Immatriculation</b></label>
                <input class="zonetext" type="text" placeholder="Entrer Immatriculation" name="txtImm" required>

                <label><b>Marque</b></label>
                <input class="zonetext" type="text" placeholder="Entrer la Marque" name="txtMarque" required>

               <label><b>Prix de Location </b></label>
                <input class="zonetext" type="text" placeholder="Entrer Prix de Location" name="txtPl" required>
                
                <label><b>Photo</b></label>
                <input class="zonetext" type="file" placeholder="choisir une photo" name="txtphoto" required>
                
                <input type="submit" id='submit' class="submit" name="btadd" value='Ajouter' >
                
		<p><a href="accueil.php" class="submit" >Tableau de Bord</a></p>
                
                <label style="text-align: center;color: #360001;">
                	
                	<?php
	if(isset($_POST['btadd']))
	{
		$imm=$_POST['txtImm'];
		$marque=$_POST['txtMarque'];
		$prixloc=$_POST['txtPl'];
				
  	$image = $_FILES['txtphoto']['tmp_name'];
  	
		//$image_text = mysqli_real_escape_string($cnloccar, $_POST['txtphoto']);

  	$target = "images/".$_FILES['txtphoto']['name'];
//$target = "images/".basename($image);
		if (move_uploaded_file($image,$target)) {
  		$msg = "Image téléchargée avec succès";
  	}else{
  		$msg = "Impossible de télécharger l'image";
  	}
  	$sql = "INSERT INTO automobile (Immatriculation, Marque,Prix_Loc,Photo) VALUES ('$imm','$marque','$prixloc', '$target')";
		$resultat=mysqli_query($cnnclocation,$sql);

if($resultat)
{
	echo "Insertion des données validés";
}else{
	echo "Echec d'insertion des données !";
}
  	
  }
  
		
		
	?>
                	
                	
                	
                </label>
	</form>
	
	
	
</div>


</body>
</html>