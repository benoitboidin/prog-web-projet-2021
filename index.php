<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include "entete.inc.html";
	require "requete.class.php";
	require "menu.class.php";
	$menu = new Menu();
	$menu->afficherMenu();
	include "accueil.inc.html";

	/*
	Affichage de la grille des sites.
	*/
	try{
		$req="SELECT idsite, nomsite, image FROM site ORDER BY nomsite";
		$liste = new Requete($req);
		$liste->executer();
		$liste->afficher("site");

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

  include "pied.inc.html";
?>
