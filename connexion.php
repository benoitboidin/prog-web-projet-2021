<?php
session_start();

include("entete.inc.html");
require("template.class.php");
require("connexion.class.php");

$id = new ID();

if (isset($_POST["login"])) {
	if ($id->verif($_POST["login"], $_POST["passwd"])){
		echo "<p>Identifiants corrects !</p>";
		$_SESSION["login"] = $_POST["login"];
		$_SESSION["passwd"] = $_POST["passwd"];
	} else
		echo "<p>Login ou mot de passe incorrect</p>";
	echo "<p><a href=\"" . $_SERVER["PHP_SELF"] . "\">Retour</a></p>";

} elseif (!isset($_SESSION["login"])) {	
	$gab = new Template("./");
	$gab->set_filenames(array("form" => "connexionform.tpl.html"));
	$gab->assign_vars(array("cible"=>$_SERVER["PHP_SELF"]));
	$gab->pparse("form");
} else {
// Traitement
	if ($id->verif($_SESSION["login"], $_SESSION["passwd"])) {
		echo "<p>Session OK</p>";
// Exercice 4
		if (!isset($_GET["action"])) {
			echo'<p><a href="index.php">Retour à l\'accueil</a></p>';
		} 
	}
}

include("pied.inc.html");
?>