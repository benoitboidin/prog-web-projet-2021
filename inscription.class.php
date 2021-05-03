<?php

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
		
		$req = 'INSERT INTO grimpeur (login,passwd) VALUES ("'.$login.'","'.$passwd.'");';
		mysqli_query($connexion, $req);
		$_SESSION['login'] = $login;
		$req2='SELECT idgrimpeur FROM grimpeur WHERE login="'.$login.'" AND $passwd="'.$$passwd.'";';
		$res=mysqli_query($connexion, $req2);
		$utilisateur = mysqli_fetch_array($res);
		$_SESSION['id']=$utilisateur['idgrimpeur'];
		mysqli_close($connexion);
	
		header("Location:index.php");
		}
		else {
		
		}
	}
	
	}
}
?>