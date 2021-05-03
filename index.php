<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include "entete.inc.html";
	require("index.class.php");
	$menu = new Menu();
	$menu->afficherMenu();
	include "accueil.inc.html";
	require("connect.inc.php");


	try{
		//Connexion à la BDD.
		$c = new PDO("mysql:host=$host;dbname=$dbname", $identifiant, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Exécution et affichage des requêtes.
		$req="SELECT idsite, nomsite, image FROM site";
		$liste = new Requete($c,$req);
		$liste->executer();
		$liste->afficherSite();

	} catch(PDOException $erreur) {
		//Erreur de connexion à la BDD.
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

    include "pied.inc.html";
?>
