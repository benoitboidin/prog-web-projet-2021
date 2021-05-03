<?php
session_start();
include("entete.inc.html");

require("template.class.php");
require("inscription.class.php");

$inscrip = new Inscrip();

if (isset($_POST["login"])) {
	$inscrip->Nouveau($_POST["login"], $_POST["passwd"],$_POST["passwd2"]);
	$message = 'Les mots de passe sont différents.';

	$gab = new Template("./");
	$gab->set_filenames(array("form" => "inscriptionform.tpl.html"));
	$gab->assign_vars(array("message"=>$message));
	$gab->pparse("form");
}	
elseif (!isset($_SESSION["login"])) {
	$message = 'Remplissez le formulaire pour vous inscrire.';
	$gab = new Template("./");
	$gab->set_filenames(array("form" => "inscriptionform.tpl.html"));
	$gab->assign_vars(array("message"=>$message));
	$gab->pparse("form");
	
}

include("pied.inc.html");
?>
