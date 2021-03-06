<?php

	require "template.class.php" ;
	require "connect.inc.php" ;

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
			Attention : les requêtes INSERT INTO et DELETE
			ne renvoient rien et produisent donc une erreur.
			*/
			$this->data = $res->fetchAll(PDO::FETCH_ASSOC);
		}

		public function afficher($type) {

			switch ($type) {
				/*
				Affichage de la grille des sites.
				*/
		    case "site":
					$tpl = new Template("sites.tpl.html");
					$tpl->set_filenames(array("site" => "sites.tpl.html"));

					if (isset($_SESSION["login"])) {
						$tpl->assign_block_vars("connect",
															array("msg" =>
																		"Ajouter un site"));
					}
					else {
						$tpl->assign_block_vars("defaut",
															array("msg" =>
																		"Connectez-vous pour
																		ajouter un site."));
					}

					foreach ($this->data as $ligne){
						$tpl->assign_block_vars("ligne.unite",
															array("nom_img" => $ligne["image"],
																		"nom_site" => $ligne["nomsite"],
																		"id" => $ligne["idsite"]));
						}
			    break;

				/*
				Affichage des informations d'un sites.
				*/
				case "infos":
					$tpl = new Template("infos.tpl.html");
					$tpl->set_filenames(array("infos" => "infos.tpl.html"));

					foreach ($this->data as $ligne){
						$tpl->assign_block_vars("info",
															array("image" => $ligne["image"],
																		"nom_site" => $ligne["nomsite"],
																		"localisation" => $ligne["localisation"],
																		"niveau" => $ligne["niveau"],
																		"nbvoies" => $ligne["nbvoies"],
																		"nomtype" => $ligne["nomtype"]));
				    }
		      break;

				/*
				Affichage des commentaires.
				*/
				case "com":
					$tpl = new Template("user.tpl.html");
					$tpl->set_filenames(array("com" => "user.tpl.html"));

					foreach ($this->data as $ligne){
						if (!isset($_SESSION["login"])
								or $ligne["idgrimpeur"]!=$_SESSION["id"]){
							$tpl->assign_block_vars("unite",
															array("grimpeur" => $ligne["login"],
																	"commentaire" => $ligne["contenu"],
																	"date" => $ligne["date"]));
						}

						/*
						Afficher supprimer et modifier uniquement
						pour celui qui a effectué le commentaire.
						*/
						if (isset($_SESSION["login"])
								and $ligne["idgrimpeur"]==$_SESSION["id"]) {

							$tpl->assign_block_vars("unite",
															array("grimpeur" => $ligne["login"],
																	"date" => $ligne["date"]));

							$tpl->assign_block_vars("unite.connect",
																array("page" => "infos.php?site=".$_GET["site"],
																		"idmessage" => $ligne["idmessage"],
																		"commentaire" => $ligne["contenu"]));

							$tpl->assign_block_vars("unite.user",
																array("cible" => $_SERVER["PHP_SELF"],
																		"idmessage" => $ligne["idmessage"],
																		"site" => $_GET["site"]));
						}
				   }
		      break;

				/*
				Affichage du formulaire pour commenter.
				*/
				case "com_form":
					$tpl = new Template("com.tpl.html");
					$tpl->set_filenames(array("com_form" => "com.tpl.html"));
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
																		poster un commentaire."));
					}
		      break;
			}
			$tpl->pparse($type);
		}
	}
?>
