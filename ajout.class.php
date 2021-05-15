<?php

Class Ajout {

	private $nomsite;
	private $villesite;
	private $cotation;
	private $nbvoies;
	private $type;

	public function Ajoutsite($param_nomsite,$param_villesite,$param_cotation,
														$param_nbvoies,$param_type,$param_photo) {

		if($_FILES["nom_du_fichier"]["name"]==""){
				$_FILES["nom_du_fichier"]["name"]= "null.jpg";
			}
		else{
			// Vérification image.
			if ($_FILES['nom_du_fichier']['error']) {
				die("Erreur du transfert de l'image.<br>
						<a href=\"Index.php\">Accueil</a>");
			}

			// Transfert de l'image vers le répertoire.
			if (isset($_FILES['nom_du_fichier']['name'])
					&& ($_FILES['nom_du_fichier']['error'] == UPLOAD_ERR_OK)) {
				$chemin_destination = 'image-site/';
				move_uploaded_file($_FILES['nom_du_fichier']['tmp_name'],
											$chemin_destination.$_FILES['nom_du_fichier']['name']);
			}
		}

		if (!empty($param_nomsite) and !empty($param_villesite)
				and !empty($param_cotation) and !empty($param_nbvoies)
				and !empty($param_type) and !empty($param_photo)) {
			$nomsite = $param_nomsite;
			$villesite = $param_villesite;
			$cotation = $param_cotation;
			$nbvoies = $param_nbvoies;
			$type = $param_type;
			$photo = $param_photo;

			$c = new PDO("mysql:host=localhost;dbname=escalade-db",	"root", "root");
			$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$req = 'INSERT INTO site (nomsite, localisation, niveau,
																nbvoies, image, idtype)
							VALUES ("'.$nomsite.'","'.$villesite.'","'.$cotation.'",
											"'.$nbvoies.'","'.$photo.'","'.$type.'");';
			echo $req;
			$res = $c->prepare($req);
			$res->execute();
			header("Location:index.php");
		}

	}
}
?>
