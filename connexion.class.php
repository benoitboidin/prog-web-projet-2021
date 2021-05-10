<?php

class ID {

	private $login;
	private $passwd;

	/*
	La fonction retourne :
		- "NULL" si l'utilisateur a oublié un champ.
		- "echec" si les logs ne correspondent pas.
		- "OK" si la connexion a réussi.
	*/

	public function Verif($param_login,$param_passwd){

		if (!empty($param_login) and !empty($param_passwd)) {
			$login = $param_login;
			$passwd = $param_passwd;

			$c = new PDO("mysql:host=localhost;dbname=escalade-db",
										"root", "root");
			$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req = 'SELECT *
							FROM grimpeur
							WHERE login="'.$login.'" AND passwd="'.$passwd.'";';
			$res = $c->prepare($req);
			$res->execute();
			$infos = $res->fetchAll(PDO::FETCH_ASSOC);
			if (count($infos)==1){
				$_SESSION['login'] = $login;
				$_SESSION['passwd'] = $passwd;
				$_SESSION['id'] = $infos[0]['idgrimpeur'];
				return("OK");
			}

			else{
				return("echec");
			}
		}
		else {
			return("NULL");
		}
	}
}

/*
//Vérification de la connexion à la BDD.
if ($connexion->connect_error) {
	die("DB connection failed: " . $conn->connect_error);
}
else {
	echo 'DB connection OK.';
}
*/

?>
