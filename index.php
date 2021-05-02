<?php
	// Ouverture de la session.
	session_start();
	// Inclusion du haut de la page (Menu etc...)
	include "entete.inc.html";
	include "menu.inc.html";
	include "accueil.inc.html";
	require("connect.inc.php");
	require("index.class.php");
	//require("template.class.php");

	/*
	J'ai essayé d'utiliser un template pour faire apparaitre des
	boutons différents en fonction de si l'utilisateur est
	connecté ou non, mais ça plante complètement quand j'inclue
	le moteur de templates.

		if(!isset($_SESSION[login])){
			//Pas de connexion.
			$boutons = array('Connexion', 'Inscription');/*
			$gab = new Template("./");
			$gab->set_filenames(array("menu" => "menu.tpl.html"));
			foreach ($boutons as $ligne){
				$tpl->assign_block_vars("ligne.bouton",
																array("bouton" => $ligne[0],
																"bouton2" => $ligne[1]));
				}
			$gab->pparse("menu");
		}
		else{
			//Connecté.
			$bouton = 'Déconnexion';
			$bouton2 = '';
			$gab = new Template("./");
			$gab->set_filenames(array("menu" => "menu.tpl.html"));
			$gab->assign_vars(array("bouton"=>$bouton, "bouton2"=>$bouton2));
			$gab->pparse("menu");
		}*/

	try{
		//Connexion à la BDD.
		$c = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Exécution et affichage des requêtes.
		$req="SELECT idsite, nomsite, image FROM site";
		$liste = new Requete($c,$req);
		$liste->executer();
		$liste->afficherSite();

	} catch(PDOException $erreur) {
		//Erreur de connexion à la BDD.
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}

    include "pied.inc.html";
?>
