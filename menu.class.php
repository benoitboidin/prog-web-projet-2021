<?php
class Menu {
  public function afficherMenu(){
    /*
    Affichage dynamique du menu en fonction de la connexion.
    Requière le template et la session.
    */
    if(!isset($_SESSION[login])){
      /*
      Utilisateur non connecté : afficher "Connexion" et "Inscription".
      */
      $bouton = 'Connexion';
      $href = 'connexion.php';
      $bouton2 = 'Inscription';
      $href2 = 'inscription.php';
      $gab = new Template("./");
      $gab->set_filenames(array("menu"=>"menu.tpl.html"));
      $gab->assign_vars(array("bouton"=>$bouton,
                              "href"=>$href,
                              "bouton2"=>$bouton2,
                              "href2"=>$href2));
      $gab->pparse("menu");
    }
    else{
      /*
      Utilisateur connecté  : afficher "Déconnexion".
      */
      $bouton = 'Connecté';
      $href = '#';
      $bouton2 = 'Déconnexion';
      $href2 = 'deconnexion.php';
      $gab = new Template("./");
      $gab->set_filenames(array("menu"=>"menu.tpl.html"));
      $gab->assign_vars(array("bouton"=>$bouton,
                              "href"=>$href,
                              "bouton2"=>$bouton2,
                              "href2"=>$href2));
      $gab->pparse("menu");
    }
  }
}
?>
