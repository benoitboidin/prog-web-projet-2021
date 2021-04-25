<?php

	require("template.class.php");

	class Requete {
		private $pdo;
		private $req;
		private $data;
		private $img;
		private $req_img;
		private $data_img;

		function __construct($param_pdo, $param_req, $param_req_img) {
			$this->pdo = $param_pdo;
			$this->req = $param_req;
			$this->req_img = $param_req_img;
		}
		
		public function executer() {
			$res = $this->pdo->prepare($this->req);
			$res->execute();
			
			$res_img = $this->pdo->prepare($this->req_img);
			$res_img->execute();
			
			$this->data = $res->fetchAll(PDO::FETCH_ASSOC);
			$this->img = $res_img->fetchAll(PDO::FETCH_ASSOC);
		}

		public function afficherSite() {
		
		    //Utilisation du template 
			$tpl = new Template("sites.tpl.html");
			$tpl->set_filenames(array("site" => "sites.tpl.html"));

			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("ligne", array("rien" => ""));
				foreach($ligne as $val) {
					$tpl->assign_block_vars("ligne.unite", array("nom_site" => $val, "nom_img" => $val));
					echo $val;
				}
			}
			
			foreach ($this->img as $ligne){
				$tpl->assign_block_vars("ligne", array("rien" => ""));
				foreach($ligne as $val) {
					$tpl->assign_block_vars("ligne.unite", array("nom_img" => $val));
					echo $val;
				}
			}
			
			$tpl->pparse("site");

			/* J'ai essayé ça mais j'arrive pas à manipuler le tableau $val
			genre $val[0] par exemple ça fonctionne pas...
			
			public function afficherSite() {
		
		    //Utilisation du template 
			$tpl = new Template("sites.tpl.html");
			$tpl->set_filenames(array("site" => "sites.tpl.html"));

			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("ligne", array("rien" => ""));
				foreach($ligne as $val) {
					$tpl->assign_block_vars("ligne.unite", 
						array("nom_site" => $val[0], 
							  "nom_img" => $val[1]));
					echo $val;
				}
			}
			*/
		}
	}
?>