<?php	
	
Class Ajout {

	private $nomsite;
	private $villesite;
	private $cotation;
	private $nbvoies;
	private $type;

	public function Ajoutsite($param_nomsite,$param_villesite,$param_cotation,$param_nbvoies,$param_type) {
	
		$nomsite = $_POST["nomsite"];
		$villesite = $_POST["villesite"];
		$cotation = $_POST["cotation"];
		$nbvoies = $_POST["nbvoies"];
		$type = $_POST["type"];
	
		$c = new PDO("mysql:host=localhost;dbname=escalade-db",	"root", "root");
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$req = 'INSERT INTO site (nomsite, localisation, niveau, nbvoies, image, idtype)
							VALUES ("'.$nomsite.'","'.$villesite.'","'.$cotation.'","'.$nbvoies.'"," " ,"'.$type.'");';
		$res = $c->prepare($req);
		$res->execute();
	}
}
	
		
		
?>