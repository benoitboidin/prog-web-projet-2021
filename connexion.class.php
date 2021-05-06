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

			/*
			Connexion à la base de données.
			Il faut remplacer mysqli par PDO, en incluant
			les identifiants.
			*/
			$connexion = mysqli_connect("localhost", "root", "root");
			$connexion->set_charset("utf8");
			mysqli_select_db($connexion, "escalade-db");

			//Requête.
			$req = 'SELECT *
							FROM grimpeur
							WHERE login="'.$login.'" AND passwd="'.$passwd.'";';
			$res = mysqli_query($connexion, $req);

			//Si les identifiants sont bons.
			if (mysqli_num_rows($res)==1){
				$_SESSION['login'] = $login;
				$_SESSION['passwd'] = $passwd;
				$utilisateur = mysqli_fetch_array($res);
				$_SESSION['id'] = $utilisateur['idgrimpeur'];
				return("OK");

			}
			else{
				//Si l'utilisateur s'est trompé.
				return("echec");
			}
			mysqli_close($connexion);
		}
		else {
			//Si l'utilisateur n'a pas tout rempli.
			return("NULL");
		}
	}

	public function Deconnexion(){
		// Suppression du tableau de connexion.
		$_SESSION=array();
		// Retour à l'index.
		header("Location:index.php");
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
