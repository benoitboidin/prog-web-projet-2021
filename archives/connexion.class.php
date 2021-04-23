<?php

class ID {
	
	private $login = "antoine";
	private $passwd = "test";
	
	/* La fonction retourne : 
		- "NULL" si l'utilisateur a oublié un champ.
		- "echec" si les logs ne correspondent pas. 
		- Renvoie à l'index si la connexion a réussi.
	*/

	public function Verif($param_login,$param_passwd){

		//Vérification des champs. 
		if (!empty($param_login) and !empty($param_passwd)) {
		$login = $param_login;
		$passwd = $param_passwd;

		//Connexion à la base de données.
		$connexion = mysqli_connect("localhost", "root", "root");
		$connexion->set_charset("utf8");
			mysqli_select_db($connexion, "projet_db");

			//Requête de vérification de la connexion. 
			$req = 'SELECT * FROM UTILISATEUR WHERE pseudo="'.$login.'" AND mdp="'.$passwd.'";';
			$res = mysqli_query($connexion, $req);

			//Stockage des variables de session.
			if (mysqli_num_rows($res)==1){
				$_SESSION['pseudo'] = $pseudo;
				$_SESSION['mdp'] = $passwd;
				$utilisateur = mysqli_fetch_array($res); 
				$_SESSION['id'] = $utilisateur['IdUser']; 
				header("location:Index.php");
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
		header("location:Index.php");
	}
}
?>