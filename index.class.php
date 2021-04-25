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
		
		    //Utilisation du template 
			$tpl = new Template("sites.tpl.html");
			$tpl->set_filenames(array("site" => "sites.tpl.html"));			
	
			foreach ($this->data as $ligne){
				$tpl->assign_block_vars("ligne.unite", array("nom_img" => $ligne["image"], "nom_site" => $ligne["nomsite"]));
		    }
			
			$tpl->pparse("site");
		}
	}
?>