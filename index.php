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
		//Connexion à la BDD.
		$c = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Exécution et affichage des requêtes.
		$req="SELECT nomsite, image FROM site";
		$liste = new Requete($c,$req);
		$liste->executer();
		$liste->afficherSite();

	} catch(PDOException $erreur) {
		//Erreur de connexion à la BDD.
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

    include "pied.inc.html";
?>
