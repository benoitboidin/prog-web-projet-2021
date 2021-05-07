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
		$req='INSERT INTO message(date, contenu, idsite, idgrimpeur)
					VALUES ("'.date("Y-m-d").'",
									"'.$_POST["contenu"].'",
									'.$_POST["site"].',
									'.$_POST["grimpeur"].');';
		$liste = new Requete($req);
		$liste->executer();

	} catch(PDOException $erreur) {
		$erreur->getMessage();
	}

	//Suppression d'un commentaire
	// try{
		 // $req='DELETE FROM message WHERE idmessage="'.$_GET["idmessage"].'";';
		// $req='DELETE FROM message WHERE idmessage=24;';
		// $liste = new Requete($req);
		// $liste->executer();
		
	// } catch(PDOException $erreur) {
		// echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	// }
	
	//Affichage des infos du site.
  try{
		//Connexion à la BDD.
		$c = new PDO("mysql:host=$host;dbname=$dbname", $identifiant, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Exécution et affichage des requêtes.
		$req="SELECT nomsite, localisation, niveau, nbvoies, image, nomtype
          FROM site, type
          WHERE idsite=".$_GET["site"]." AND type.idtype = site.idtype ;";
		$liste = new Requete($req);

		$liste->executer();
		$liste->afficherInfos();

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

	//Affichage des commentaires.
	try{
		$c = new PDO("mysql:host=$host;dbname=$dbname", $identifiant, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$req2="SELECT grimpeur.login, message.contenu, message.date, message.idgrimpeur, message.idmessage
					FROM message
					INNER JOIN grimpeur
					ON grimpeur.idgrimpeur = message.idgrimpeur
					WHERE message.idsite = ".$_GET["site"]."
					ORDER BY message.date;";
		$liste2 = new Requete($req2);

		$liste2->executer();
		$liste2->afficherCom();

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

	$com = new Requete("", "");
	$com->afficherFormCom();

  include "pied.inc.html";
?>
