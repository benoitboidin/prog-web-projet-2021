<?php

/*	
	try{
		//Connexion
		$c = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo"<p>Connexion réussie.</p>\n";
	
		//ajouter les requêtes
	
	} catch(PDOException $erreur) {
		echo "<p>Erreur : ".$erreur->getMessage()."</p>\n";
	}
*/

	// Ouverture de la session. 
	session_start();
	// Inclusion du haut de la page (Menu etc...)
    include "entete.inc.html";
    include "menu.inc.html";
    include "accueil.inc.html";

    // Test pour l'affichage MVC.
    $liste = array("Limas", "Montléans", "Crept");

    // Utilisation du template. 
    require'template.class.php';
    $tpl = new Template("sites.tpl.html");
	$tpl->set_filenames(array("site" => "sites.tpl.html"));

	foreach ($liste as $val){
		$tpl->assign_block_vars("unite", array("nom_site" => $val));
	}
	$tpl->pparse("site");

    include "pied.inc.html";
?>
