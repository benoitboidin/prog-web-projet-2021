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

		$connexion=mysqli_connect("localhost","root","root");
		mysqli_select_db($connexion,"escalade-db");

		$req = 'INSERT INTO grimpeur (login,passwd)
						VALUES ("'.$login.'","'.$passwd.'");';
		mysqli_query($connexion, $req);

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
