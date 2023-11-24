		<!-- PAGE PAR DEFAUT -->

		<!-- Nom du pseudo � afficher -->
		<h3>Bienvenue <?php echo $_SESSION["pseudo"]?> !</h3>
		<p style="color:darkblue;">Bravo, cette page utilise PHP</p>
		<p>...</p>
		
			
		<!-- Un compteur de visite en PHP � inclure ? -->
		<?php
		$jour = date("d");
		$mois = date("m");
		$annee = date("Y");
	
		$heure = date("H");
		$minute = date("i");
		$seconde = date("s");

		echo "Nous sommes le : " . $jour . "/" . $mois . "/" . $annee ;
		echo "<br />";
		echo "Il est : " . $heure . ':' . $minute . ":" .$seconde;
		echo "<p>...</p>";
		include("compteur.php");
		?>
			
