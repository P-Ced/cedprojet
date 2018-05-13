<?php
session_start();
require "models/panier.php";
if(!empty($_SESSION['login']))
{
  if(creation()){
    $erreur = false;

    $action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
    if($action !== null)
    {
       if(!in_array($action,array('suppression', 'refresh', 'valider')))
       $erreur=true;

       //récuperation des variables en POST ou GET
       $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
       $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
       $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

       //Suppression des espaces verticaux
       $l = preg_replace('#\v#', '',$l);
       //On verifie que $p soit un float
       $p = floatval($p);

       //On traite $q qui peut etre un entier simple ou un tableau d'entier

       if (is_array($q)){
          $QteArticle = array();
          $i=0;
          foreach ($q as $contenu){
             $QteArticle[$i++] = intval($contenu);
          }
       }
       else
       $q = intval($q);

    }

    if (!$erreur){
       switch($action){
          Case "suppression":
                supprimer($l);
                break;

          Case "refresh" :
                 for ($i = 0 ; $i < count($QteArticle) ; $i++)
                 {
                   if(round($QteArticle[$i]) > 0){
                     modifierQteArticle($_SESSION['panier']['p_code'][$i],round($QteArticle[$i]));
                   }else {
                     supprimer($_SESSION['panier']['p_code'][$i]);
                   }
                 }
                 break;

          Case "valider" :
                if(empty($_SESSION['panier']))
                {
                  header('loaction: panier');
                }
                else {
                $cout_panier = montant();
                valider($cout_panier);
                supprimePanier();
                creation();
                ?><script language="javascript">alert("Valider!")</script><?php
                header('loaction: index');
                }
                break;

          Default:
                break;
       }
    }
    $nbArticles=count($_SESSION['panier']['p_nom']);
    include 'views/panier.php';
  }
} else {
  header('location: login');
}
?>
