<?php

// Fonction d'affichage du formulaire pour afficher seulement quand le formulaire n'est pas expédié.

function formulaire(){

	echo '<form method="post" action="page.php?article=contact">
			
			<div class="formulaire">
			
				<p>
					<input type="text" placeholder="Votre nom" name="c_nom" />
				</p>
			
				<p>
					<input type="text" placeholder="Prénom" name="c_pnom" />
				</p>
				
				<p>
					<input type="text" placeholder="N° de téléphone" name="c_tel" />
				</p>
				
				<p>
					<input type="text" placeholder="Email" name="c_mail" />
				</p>
					<textarea  placeholder="Votre message ..." style="height:150px" name="c_msg"></textarea>
				<br>
				<form action="contact.php" method="post">
					<input type="text" name="captcha">
				   <img src="inc/image.php" onclick="this.src=\'inc/image.php?\' + Math.random();" alt="captcha" style="cursor:pointer;">
				   <p> Cliquer sur le captcha pour le recharger. </p>
				</form>

				<p>
					<input type="submit" class="btnAction" name="goto_send" value="Envoyer le formulaire.">
				</p>
				
			</div>
			
		</form>';
}

//Fonction de validation du format de l'e-mail

function validateMail($email){
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}



?>
		<h3> Nous contacter </h3>

<?php

		// Initialisation des variables

		$nom=null;
		$pnom=null;
		$tel=null;
		$mail=null;
		$msg=null;
		$captcha=null;
		$champvide=false;


		// Récupération des entrées dans les champs du formulaire

		if(isset($_POST["c_nom"])) $nom = $_POST["c_nom"];
		if(isset($_POST["c_pnom"])) $pnom = $_POST["c_pnom"];
		if(isset($_POST["c_tel"])) $tel = $_POST["c_tel"];
		if(isset($_POST["c_mail"])) $mail = $_POST["c_mail"];
		if(isset($_POST["captcha"])) $captcha = $_POST["captcha"];
		if(isset($_POST["c_msg"])) $msg = $_POST["c_msg"];


		
		// Vérification de la complétion des champs

		foreach ($_POST as $value){
			if (empty($value)){
				$champvide = true;
				break;
			}
		}
		
		// Ici on teste si toutes les conditions sont bonnes pour enregistrer les champs dans un fichier .txt
		// Et afficher le message d'expédition du formulaire

		if( isset( $_POST['goto_send'] ) AND !$champvide AND $_SESSION["code"]==$captcha AND validateMail($mail)){
		

			//Enregistrement des champs saisis dans un fichier .txt
			$formulaire = "formulaire.txt";
			if ( ! file_exists($formulaire) ) {
			touch($formulaire); $data="";
			} else {
			$data = file_get_contents($formulaire);
			$data = "Nom : ".$nom."\nPrénom : ".$pnom."\nTel : ".$tel."\nMail : ".$mail."\nMessage : ".$msg;
			file_put_contents($formulaire, $data);
			}

		echo "<h4 style='color:green'>Le formulaire a été expédié !</h4>";
		
		// Ici, si une des conditions d'envoi n'est pas valide, on affiche le message de non-expédition


		} elseif (isset( $_POST['goto_send'] ) AND ($_SESSION["code"]!=$captcha OR $champvide OR !validateMail($mail))){
		
		
		
		echo "<h4 style='color:red'>Le formulaire n'a pas été expédié !</h4>";

		// On renseigne si l'adresse e-mail n'est pas une adresse valide

		if (!validateMail($mail)) {
			echo "<h5 style='color:red'>Merci de rentrer un e-mail valide !</h5>";
		}
		formulaire();
		} else {
			formulaire();
		}
		
?>


		
		<!-- ajout de Google maps en utilisant iFrame - récupération du lien sur google.com/maps -->
		<div class="d-flex align-content-center justify-content-center">
      		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.902901227331!2d-2.773143324759356!3d47.647453685157096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48101c1ee7bc3d91%3A0xa622fa4c9bf9c44c!2sLyc%C3%A9e%20G%C3%A9n%C3%A9ral%20et%20technologique%20Alain%20Rene%20Lesage!5e0!3m2!1sfr!2sfr!4v1695386728516!5m2!1sfr!2sfr" width="1000" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    	</div>
		</p>