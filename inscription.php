<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include "entete.inc.html";
	require("requete.class.php");
	require("menu.class.php");
	$menu = new Menu();
	$menu->afficherMenu();
	require("inscription.class.php");

	$inscrip = new Inscrip();

	if (isset($_POST["login"])) {
		$inscrip->Nouveau($_POST["login"], $_POST["passwd"], $_POST["passwd2"]);

		$message = 'Les mots de passe sont différents.';

		$gab = new Template("./");
		$gab->set_filenames(array("form"=>"inscriptionform.tpl.html"));
		$gab->assign_vars(array("message"=>$message));
		$gab->pparse("form");
	}
	elseif (!isset($_SESSION["login"])) {
		$message = 'Remplissez le formulaire pour vous inscrire.';
		$gab = new Template("./");
		$gab->set_filenames(array("form"=>"inscriptionform.tpl.html"));
		$gab->assign_vars(array("message"=>$message));
		$gab->pparse("form");

	}

	include("pied.inc.html");
?>
