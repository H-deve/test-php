
			<h1> Page MEDIA </h1>
			
	<?php

		//enregistrement de l'emplacement des images dans une variable
		$glob_dir = "./image/";
		//recherche dans le dossier img de tous les documents
		$files = glob($glob_dir . "*");
		//ici on va demander l'affichage de tous ce qu'il se trouve dans le dossier image
		foreach($files as $image) {
		//ajout d'une bordure autour de l'image puis affichage de l'image 
		echo "
		<p>
		<div style='border: 1px solid darkgrey;'>
		<img src='".$image."' />
		</div>
		</p>
		";
		}
		//ici on ajout un message "d'erreur" s'il n'y a pas d'image dans le dossier
		if(!$files)echo "Pas d'images.";
	?>		