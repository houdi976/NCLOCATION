<?php require_once('connexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tableau de Bord...</title>

<style>
	.myphoto{
		width: 130px;height: 100px;border-radius: 5%;border: 1px solid;
	}
	</style>
<link rel="stylesheet" href="nclocation_style.css" type="text/css">
</head>

<body>
<div id="global">
<div id="profil">
<?php
	
	session_start();
	echo "Bonjour et Bienvenue ".$_SESSION['login']."<br>";
	
	$req="select * from utilisateurs where login='".$_SESSION['login']."'";
	$resultat=mysqli_query($cnnclocation,$req);
	$ligne=mysqli_fetch_assoc($resultat);
	?>
	<img src="<?php echo $ligne['my.photo'];?>" class="myphoto" >
	
<br>	
<a href="deconnecter.php">Deconnection</a>
</div>

	<div id="tableaubord">

	<?php include("tableauBord.php");?>
	</div>
</div>
</body>
</html>