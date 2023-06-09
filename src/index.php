<?php require_once('Connexion.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
<link rel="stylesheet" href="nclocation_style.css" />
</head>

<body>
<div id="entete">
	
<a href="login.php" class="login">Login</a>
	
	<video class="video_entete" autoplay >
		<source   src="images/car.mp4" type="video/mp4">
	</video>

	<p class="nomsite">N&C Location</p>
	<div id="formauto">
		<form name="formauto" method="post" action="">
		<input id="motcle" type="text" name="motcle" placeholder="  Recherche par Marque..." />
		<input class="btfind" type="submit" name="btsubmit" value="Recherche" />
		</form>
	</div>
</div>
<div id="articles">
<?php
require_once('Connexion.php');

// Vérifier la connexion
if (mysqli_connect_errno()) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

if (isset($_POST['btsubmit'])) {
    $mc = "%" . $_POST['motcle'] . "%";
    $stmt = $cnnclocation->prepare("SELECT * FROM automobile WHERE MARQUE LIKE ?");
    $stmt->bind_param("s", $mc);
} else {
    $stmt = $cnnclocation->prepare("SELECT * FROM automobile");
}

$stmt->execute();
$resultat = $stmt->get_result();

// Vérifier les erreurs de la requête SQL
if (!$resultat) {
    die("La requête a échoué: " . mysqli_error($cnnclocation));
}

// Afficher les résultats
$nbr = mysqli_num_rows($resultat);
echo "<p><b> " . $nbr . "</b> Résultat(s) de votre recherche...</p>";
while ($ligne = mysqli_fetch_assoc($resultat)) {
    if (!$ligne) {
        die("La récupération de données a échoué: " . mysqli_error($cnnclocation));
    }
?>
    <div id="auto">
        <img src="<?php echo $ligne['Photo']; ?>"><br>
        <?php echo $ligne['Immatriculation']; ?><br>
        <?php echo $ligne['Marque']; ?><br>
        <?php echo $ligne['Prix_Loc'], "€/Jour"; ?><br>
    </div>
<?php } ?>

	
</div>
	
</body>
</html>