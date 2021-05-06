<?php

	require("template.class.php");
	require("connect.inc.php");


	class Requete {
		private $pdo;
		private $req;
		private $data;

		function __construct($param_req) {
			$this->req = $param_req;
		}

		//Préparation de la requête.
		public function executer() {

			$c = new PDO("mysql:host=localhost;dbname=escalade-db",
										"root", "root");
			$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$res = $c->prepare($this->req);
			$res->execute();
			/*
			Il faudrait faire en sorte d'exécuter fetchAll uniquement
			lorsqu'il y a un résultat : les requêtes INSERT INTO
			ne renvoient rien et produisent une erreur.
			*/
			$this->data = $res->fetchAll(PDO::FETCH_ASSOC);
		}

		//Affichage de la grille des sites.
		public function afficherSite() {

			$tpl = new Template("sites.tpl.html");
			$tpl->set_filenames(array("site" => "sites.tpl.html"));

			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("ligne.unite",
													array("nom_img" => $ligne["image"],
																"nom_site" => $ligne["nomsite"],
																"id" => $ligne["idsite"]));
		    }
			$tpl->pparse("site");
		}

		//Affichage des infos d'un site.
		public function afficherInfos() {

			$tpl = new Template("infos.tpl.html");
			$tpl->set_filenames(array("infos" => "infos.tpl.html"));

			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("info",
													array("image" => $ligne["image"],
																"nom_site" => $ligne["nomsite"],
																"localisation" => $ligne["localisation"],
																"niveau" => $ligne["niveau"],
																"nbvoies" => $ligne["nbvoies"]));
		    }
			$tpl->pparse("infos");
		}

		//Affichage des commentaires d'un site.
		public function afficherCom() {
			$tpl = new Template("user.tpl.html");
			$tpl->set_filenames(array("user" => "user.tpl.html"));

			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("unite",
													array("grimpeur" => $ligne["login"],
																"commentaire" => $ligne["contenu"],
																"date" => $ligne["date"]));
		    }

			$tpl->pparse("user");
		}

		//Affichage du formulaire commentaire.
		public function afficherFormCom(){
			//Faire en sorte d'afficher uniquement si la session est ouverte.
			$tpl = new Template("com.tpl.html");
			$tpl->set_filenames(array("com" => "com.tpl.html"));
			if (isset($_SESSION["login"])) {
				$tpl->assign_block_vars("unite",
													array("page" => "infos.php?site=".$_GET["site"],
																"grimpeur" => $_SESSION["id"],
																"site" => $_GET["site"]));
			}
			else {
				$tpl->assign_block_vars("defaut",
													array("message" =>
																"Connectez-vous pour
																poster un commentaire.",));
			}
			$tpl->pparse("com");
		}
	}
?>
