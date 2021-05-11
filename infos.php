<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include "entete.inc.html";
	require("requete.class.php");
	require("menu.class.php");
	$menu = new Menu();
	$menu->afficherMenu();
	require("connect.inc.php");

	//Enregistrement d'un commentaire.
	if (isset($_POST["contenu"])){
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
	}

	//Modification d'un message
		if (isset($_POST["modif"])){
	 try{
		 $req='UPDATE message
		 			 SET contenu="'.$_POST["modif"].'"
					 WHERE idmessage="'.$_POST["idmessage"].'";';
			echo $req;
		 $liste = new Requete($req);
		 $liste->executer();

	 } catch(PDOException $erreur) {
		 $erreur->getMessage();
	 }
	}

	//Suppression d'un commentaire
	if (isset($_GET["idmessage"])){
	 try{
		 $req='DELETE FROM message
		 			 WHERE idmessage="'.$_GET["idmessage"].'";';
		 $liste = new Requete($req);
		 $liste->executer();

	 } catch(PDOException $erreur) {
		 $erreur->getMessage();
	 }
	}




	//Affichage des infos du site.
  try{
		$req="SELECT nomsite, localisation, niveau, nbvoies, image, nomtype
          FROM site, type
          WHERE idsite=".$_GET['site']." AND type.idtype = site.idtype ;";
		$liste = new Requete($req);

		$liste->executer();
		$liste->afficherInfos();

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

	//Affichage des commentaires.
	try{
		$req2="SELECT grimpeur.login, message.contenu, message.date,
									message.idgrimpeur, message.idmessage
					FROM message
					INNER JOIN grimpeur
					ON grimpeur.idgrimpeur = message.idgrimpeur
					WHERE message.idsite = ".$_GET['site']."
					ORDER BY message.date;";
		$liste2 = new Requete($req2);

		$liste2->executer();
		$liste2->afficherCom();

	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

	//Affichage du formulaire.
	$com = new Requete("", "");
	$com->afficherFormCom();

  include "pied.inc.html";
?>
