<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include "entete.inc.html";
	require("index.class.php");
	require("menu.class.php");
	$menu = new Menu();
	$menu->afficherMenu();
	require("connect.inc.php");
	include "accueil.inc.html";

	//Affichage de la grille des sites.
	try{
		/*
		$c = new PDO("mysql:host=$host;dbname=$dbname", $identifiant, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		*/
		$req="SELECT idsite, nomsite, image FROM site ORDER BY nomsite";
		$liste = new Requete($req);
		$liste->executer();
		$liste->afficherSite();

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

    include "pied.inc.html";
?>
