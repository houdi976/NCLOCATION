<?php require_once('connexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="nclocation_style.css">
<style>
	body{
    background: #F30;
}
	</style>
</head>

<body>

<div id="container">
            <!-- zone de connexion -->
            
            <form action="" method="post" class="formulaire">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input class="zonetext" type="text" placeholder="Entrer le nom d'utilisateur" name="txtlogin" required>

                <label><b>Mot de passe</b></label>
                <input class="zonetext" type="password" placeholder="Entrer le mot de passe" name="txtpw" required>

                <input type="submit" id='submit' class="submit" name="btlogin" value='LOGIN' >
                 <?php 
  if(isset($_POST['btlogin'])){
$req="select * from utilisateurs where login='".$_POST['txtlogin']."' and motPasse='".$_POST['txtpw']."'";
if($resultat=mysqli_query($cnnclocation,$req)){
$ligne=mysqli_fetch_assoc($resultat);
if($ligne!=0)
{
session_start();
$_SESSION['login']= $_POST['txtlogin'];
//echo "Bienvenue".$_SESSION['login'];
	header("location:accueil.php");
}
else {
echo "<font color='#F0001D'>Login ou mot des passe est invalide !!!!</font>";
} } }
?>
            </form>
        </div>
</body>
</html>