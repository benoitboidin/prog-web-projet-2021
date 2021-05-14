<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include ("entete.inc.html");
	require("requete.class.php");
	require("menu.class.php");
	$menu = new Menu();
	//$menu->afficherMenu();
	require("ajout.class.php");

	require ("ajout.tpl.html");

	$ajout = new Ajout();

	$ajout->Ajoutsite($_POST["nomsite"],$_POST["villesite"],$_POST["cotation"],$_POST["nbvoies"],$_POST["type"]);

	$gab = new Template("./");
	$gab->set_filenames(array("form"=>"ajout.tpl.html"));
	$gab->pparse("form");



	include ("pied.inc.html");

?>
