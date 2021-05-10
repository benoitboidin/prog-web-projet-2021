<?php
  session_start();
  require'connexion.class.php';
  $_SESSION=array();
  header("Location:index.php");
?>
