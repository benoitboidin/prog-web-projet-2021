<?php

	// Ouverture de la session. 
	session_start();
	// Inclusion du haut de la page (Menu etc...)
    include "entete.inc.html";
    include "menu.inc.html";
    include "accueil.inc.html";
	require("connect.inc.php");
	require("index.class.php");

	try{
		//Connexion
		$c = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo"<p>Connexion réussie.</p>\n";
	
		//ajouter les requêtes
		$req="SELECT nomsite FROM site";
		$req_img="SELECT image FROM site";
		//$liste = new Requete($c,$req,$req2);
		$liste = new Requete($c, $req, $req_img);
		$liste->executer();
		$liste->afficherSite();
		
	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}		
	
    include "pied.inc.html";
?>
