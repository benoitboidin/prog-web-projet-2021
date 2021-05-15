<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include "entete.inc.html";
	require "requete.class.php";
	require "inscription.class.php";
	require "menu.class.php";
	$menu = new Menu();
	$menu->afficherMenu();

	$inscrip = new Inscrip();

	/*
	Tentative d'inscription.
	*/
	if (isset($_POST["login"])) {
		$inscrip->Nouveau($_POST["login"], $_POST["passwd"], $_POST["passwd2"]);

		/*
		Échec de l'inscription.
		*/
		$message = "Les mots de passe sont différents.";

		$gab = new Template("./");
		$gab->set_filenames(array("form"=>"inscriptionform.tpl.html"));
		$gab->assign_vars(array("message"=>$message));
		$gab->pparse("form");
	}
	/*
	Affichage du formulaire.
	*/
	elseif (!isset($_SESSION["login"])) {
		$message = "Remplissez le formulaire pour vous inscrire.";
		$gab = new Template("./");
		$gab->set_filenames(array("form"=>"inscriptionform.tpl.html"));
		$gab->assign_vars(array("message"=>$message));
		$gab->pparse("form");
	}

	include "pied.inc.html";
?>
