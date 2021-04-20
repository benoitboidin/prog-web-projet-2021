<?php
	include("entete.inc.html");
	//require("connect.inc.php");
	
	echo "<h1>Accueil</h1>";
	echo'<li><a href="connexion.php">Se connecter</a></li><br/>';
/*	
	try{
		//Connexion
		$c = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo"<p>Connexion réussie.</p>\n";
	
		//ajouter les requêtes
	
	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}
*/
	
	include("pied.inc.html");
?>