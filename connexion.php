<?php
	session_start();
	include "entete.inc.html";
	require "requete.class.php";
	require "connexion.class.php";
	require "menu.class.php";
	$menu = new Menu();
	$menu->afficherMenu();

	$id = new ID();

	/*
	Tentative de connexion.
	*/
	if (isset($_POST["login"])) {

		$id->Verif($_POST["login"], $_POST["passwd"]);

		if (isset($_SESSION["login"])){
			header("Location:index.php");

		} else {
			$message = "Identifiants inconnus : veuillez essayer à nouveau.";
			$gab = new Template("./");
			$gab->set_filenames(array("form"=>"connexionform.tpl.html"));
			$gab->assign_vars(array("message"=>$message));
			$gab->pparse("form");
			}
		}

	/*
	Si l'utilisateur n'est pas connecté.
	*/
	elseif (!isset($_SESSION["login"])) {
		$message = "Veuillez entrer vos identifiants.";
		$gab = new Template("./");
		$gab->set_filenames(array("form"=>"connexionform.tpl.html"));
		$gab->assign_vars(array("message"=>$message));
		$gab->pparse("form");

	}

	else {
		header("Location:index.php");
	}

	include "pied.inc.html";
?>
