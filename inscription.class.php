<?php

require "connexion.class.php";

class Inscrip {

	private $login;
	private $passwd;
	private $passwd2;

	public function Nouveau($param_login,$param_passwd,$param_passwd2) {

	if (!empty($param_login) and !empty($param_passwd) and !empty($param_passwd2)) {
		$login = $_POST["login"];
		$passwd = $_POST["passwd"];
		$passwd2 = $_POST["passwd2"];

		if ($passwd==$passwd2) {
			$c = new PDO("mysql:host=localhost;dbname=escalade-db",
										"root", "root");
			$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req = 'INSERT INTO grimpeur (login,passwd)
							VALUES ("'.$login.'","'.$passwd.'");';
			$res = $c->prepare($req);
			$res->execute();
			$new = new ID();
			$new->Verif($login, $passwd);
			header("Location:index.php");
		}
		else {

		}
	}

	}
}
?>
