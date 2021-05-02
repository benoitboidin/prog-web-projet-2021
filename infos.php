<?php
// Ouverture de la session.
session_start();
// Inclusion du haut de la page (Menu etc...)
include "entete.inc.html";
include "menu.inc.html";
require("connect.inc.php");
require("index.class.php");

  try{
		//Connexion à la BDD.
		$c = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Exécution et affichage des requêtes.
		$req="SELECT nomsite, localisation, niveau, nbvoies, image
          FROM site
          WHERE idsite=".$_GET["site"].";";
		$liste = new Requete($c,$req);

  	$liste->executer();
		$liste->afficherInfos();

	} catch(PDOException $erreur) {
		//Erreur de connexion à la BDD.
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

  include "pied.inc.html";
?>
