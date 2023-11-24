<?php
//lancement de la session et on invalide la session (avec unset qui efface les variables de session)
session_start();
if ( !isset( $_GET["deconnection"] ) ) {
	if ( isset( $_SESSION["valid"] ) ) unset( $_SESSION["valid"]);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<!-- ci dessous le code pour l'affichage de la page si on est déconnecté -->
<?php
if(isset($_GET["deconnection"]) AND $_GET["deconnection"]==true){
?>

<body>
<div class="corps">
		<div class="contenu">
			<strong style="color:red;">Déconnecté</strong>
			<p>
			<a href="index.php">Reconnecter</a>
			</p>
		</div>
	</div>


<!-- code pour l'affichage de la page d'accueil qui demande le pseudo et le mot de passe -->
<?php
} else {
?>

<div class="corps">
	<p>
	<div class="contenu">
		
		<h3>Page d'introduction</h3>

		<p>

		<form method="post" action="page.php">
			
				<p>
					<label>Votre pseudo :</label>
					<input type="text" name="pseudo">
				</p>
			
				<p>
					<label>Mot de passe :</label>
					<input type="password" name="mot_de_passe">
				</p>
			
				<p>
					<input type="submit" value="Valider">
				</p>
			
		</form>

		</p>

	</div>
	</p>
</div>

<?php
}
?>

<div class="copyright">
© Mon site
</div>

</html>
