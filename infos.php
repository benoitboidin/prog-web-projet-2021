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

	//Enregistrement d'un commentaire.
	try{
		$c = new PDO("mysql:host=$host;dbname=$dbname", $identifiant, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$req='INSERT INTO message(date, contenu, idsite, idgrimpeur)
					VALUES ("'.date("Y-m-d").'",
									"'.$_POST["contenu"].'",
									'.$_POST["site"].',
									'.$_POST["grimpeur"].');';
		$liste = new Requete($c,$req);
		$liste->executer();

	} catch(PDOException $erreur) {
		$erreur->getMessage();
	}

	//Affichage des infos du site.
  try{
		//Connexion à la BDD.
		$c = new PDO("mysql:host=$host;dbname=$dbname", $identifiant, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Exécution et affichage des requêtes.
		$req="SELECT nomsite, localisation, niveau, nbvoies, image
          FROM site
          WHERE idsite=".$_GET["site"].";";
		$liste = new Requete($c,$req);

  	$liste->executer();
		$liste->afficherInfos();

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

	//Affichage des commentaires.
	try{
		$c = new PDO("mysql:host=$host;dbname=$dbname", $identifiant, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$req2="SELECT grimpeur.login, message.contenu, message.date
					FROM message
					INNER JOIN grimpeur
					ON grimpeur.idgrimpeur = message.idgrimpeur
					WHERE message.idsite = ".$_GET["site"].";";

		$liste2 = new Requete($c,$req2);

  	$liste2->executer();
		$liste2->afficherCom();

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

	$com = new Requete("", "");
	$com->afficherFormCom();



  include "pied.inc.html";
?>
