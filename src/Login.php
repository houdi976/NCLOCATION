<?php 

    // Tentative de connexion à la base de données
require_once('connexion.php');?>
<?php 
session_start();

// Vérifier si le jeton CSRF est défini dans la variable de session
if (!isset($_SESSION['csrf_token'])) {
    // Générer un nouveau jeton CSRF
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['btlogin'])){
    // Vérifier que le jeton CSRF soumis est valide
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        throw new Exception("Token de sécurité invalide !");
    }
    
    // Requête préparée pour éviter les injections SQL
    $req = "SELECT * FROM utilisateurs WHERE login = ? AND motPasse = ?";
    $stmt = mysqli_prepare($cnnclocation, $req);
    mysqli_stmt_bind_param($stmt, "ss", $_POST['txtlogin'], $_POST['txtpw']);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    $ligne = mysqli_fetch_assoc($resultat);
    if($ligne != 0)
    {
        // Authentification réussie, générer un nouveau jeton CSRF
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        
        $_SESSION['login'] = $_POST['txtlogin'];
        header("location:accueil.php");
    }
    else {
        throw new Exception("Login ou mot de passe invalide !");
    }
}
?>
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

        <!-- Ajouter le jeton CSRF au formulaire en tant que champ caché -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" />
        
        <input type="submit" id='submit' class="submit" name="btlogin" value='LOGIN'>
    </form>
</div>
</body>
</html>
