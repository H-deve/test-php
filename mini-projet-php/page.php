<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
<!-- Ici, on va vérifier que le mot passe saisi est correct et récupérer le mot de passe pour pouvoir l'afficher
plus tard dans la page d'accueil
-->

<?php

if (!isset($_SESSION["valid"]) AND isset($_POST["mot_de_passe"]) AND $_POST["mot_de_passe"] == "a") {
	$_SESSION["valid"] = 1;
	$_SESSION["pseudo"] = $_POST["pseudo"];
}

// code pour affichage de la page si la session est valide
if(isset($_SESSION["valid"])){
	
?>
<div class="corps header">
Vous êtes connecté avec le pseudo : <strong style="color:green;"><?php echo $_SESSION["pseudo"]?></strong>
</div>

<div class="corps">

	<div class="menu">
	
		<div class="bouton">
			<a href="page.php">Accueil</a>
		</div>
		
		<div class="bouton">
			<a href="page.php?article=media">Images</a>
		</div>
		
		<div class="bouton">
			<a href="page.php?article=contact">Contact</a>
		</div>
		
	</div>
	
	<p>
		<div class="contenu">
					
			<!-- Utilisation de la variable article pour afficher soit la page media.php ou contact.php 
			-->
			<?php
			if(isset($_GET["article"])){
				$article = $_GET["article"];
				if($article=="media"){
					include("./inc/media.php");
				} elseif($article=="contact"){
					include("./inc/contact.php");
				}
			} else {

			// page par défaut afficher quand la connexion est valide
			include("./inc/intro.php");
		}
			?>
			
		</div>
		
	</p>
	
</div>

<div class="copyright">
© Mon site | <a href="index.php?deconnection=true"> Se déconnecter </a>
</div>
<?php
} else {

?>

	<div class="corps">
		<div class="contenu">
			<strong style="color:red;">Mot de passe incorrect</strong>
			<p>
			<a href="index.php">Recommencer</a>
			</p>
		</div>
	</div>
	
	<div class="copyright">
	© Mon site
	</div>
	<!-- FIN DU CODE -->
	<?php
}
?>
</body>
</html>
