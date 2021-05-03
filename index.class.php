<?php

	require("template.class.php");

	class Requete {
		private $pdo;
		private $req;
		private $data;

		function __construct($param_pdo, $param_req) {
			$this->pdo = $param_pdo;
			$this->req = $param_req;
		}

		public function executer() {
			$res = $this->pdo->prepare($this->req);
			$res->execute();
			$this->data = $res->fetchAll(PDO::FETCH_ASSOC);
		}

		public function afficherSite() {

		  //Création du template.
			$tpl = new Template("sites.tpl.html");
			$tpl->set_filenames(array("site" => "sites.tpl.html"));

			//Assignation des variables.
			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("ligne.unite",
													array("nom_img" => $ligne["image"],
																"nom_site" => $ligne["nomsite"],
																"id" => $ligne["idsite"]));
		    }
			$tpl->pparse("site");
		}

		public function afficherInfos() {

		  //Création du template.
			$tpl = new Template("infos.tpl.html");
			$tpl->set_filenames(array("infos" => "infos.tpl.html"));

			//Assignation des variables.
			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("info",
													array("image" => $ligne["image"],
																"nom_site" => $ligne["nomsite"],
																"localisation" => $ligne["localisation"],
																"niveau" => $ligne["niveau"],
																"nbvoies" => $ligne["nbvoies"]));
		    }
			$tpl->pparse("infos"); // Ça plante ici.
		}
	}

	class Menu {
		public function afficherMenu(){
			/*
			J'ai essayé d'utiliser un template pour faire apparaitre des
			boutons différents en fonction de si l'utilisateur est
			connecté ou non.
			*/
				if(!isset($_SESSION[login])){
					//Utilisateur non connecté.
					$bouton = 'Connexion';
					$href = 'connexion.php';
					$bouton2 = 'Inscription';
					$href2 = 'inscription.php';
					$gab = new Template("./");
					$gab->set_filenames(array("menu" => "menu.tpl.html"));
					$gab->assign_vars(array("bouton"=>$bouton,
																	"href"=>$href,
																	"bouton2"=>$bouton2,
																	"href2"=>$href2));
					$gab->pparse("menu");
				}
				else{
					$//Utilisateur connecté.
					$bouton = 'Connecté';
					$href = '#';
					$bouton2 = 'Déconnexion';
					$href2 = 'deconnexion.php';
					$gab = new Template("./");
					$gab->set_filenames(array("menu" => "menu.tpl.html"));
					$gab->assign_vars(array("bouton"=>$bouton,
																	"href"=>$href,
																	"bouton2"=>$bouton2,
																	"href2"=>$href2));
					$gab->pparse("menu");
				}
		}
	}
?>
