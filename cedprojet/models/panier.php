<?php
require 'models/articles.php';
function creation()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
            $_SESSION['panier']['p_code'] = array();
            $_SESSION['panier']['p_nom'] = array();
            $_SESSION['panier']['p_image'] = array();
            $_SESSION['panier']['p_prix'] = array();
            $_SESSION['panier']['p_qte'] = array();
        }
        return true;
    }

function ajouter($p_article){
       //Si le panier existe
       if (creation())
       {
          //Si le produit existe déjà on ajoute seulement la quantité
          $positionProduit = array_search($p_article['article_code'], $_SESSION['panier']['p_code']);
          if ($positionProduit !== false)
          {
             $_SESSION['panier']['p_qte'][$positionProduit]++;
          }
          else
          {
             //Sinon on ajoute le produit
             $p_article_qte = 1;
             array_push( $_SESSION['panier']['p_code'], $p_article['article_code']);
             array_push( $_SESSION['panier']['p_nom'], $p_article['article_nom']);
             array_push( $_SESSION['panier']['p_image'], $p_article['article_image']);
             array_push( $_SESSION['panier']['p_prix'], $p_article['article_prix']);
             array_push( $_SESSION['panier']['p_qte'], $p_article_qte);
          }
       }
}
function supprimer($p_article_code){
   //Si le panier existe
   if (creation())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['p_code'] = array();
      $tmp['p_nom'] = array();
      $tmp['p_image'] = array();
      $tmp['p_prix'] = array();
      $tmp['p_qte'] = array();

      for($i = 0; $i < count($_SESSION['panier']['p_code']); $i++)
      {
         if ($_SESSION['panier']['p_code'][$i] !== $p_article_code)
         {
            array_push( $tmp['p_code'],$_SESSION['panier']['p_code'][$i]);
            array_push( $tmp['p_nom'],$_SESSION['panier']['p_nom'][$i]);
            array_push( $tmp['p_image'],$_SESSION['panier']['p_image'][$i]);
            array_push( $tmp['p_prix'],$_SESSION['panier']['p_prix'][$i]);
            array_push( $tmp['p_qte'],$_SESSION['panier']['p_qte'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un probl&eacute;me est survenu";
}

function modifierQteArticle($p_article_code,$p_article_qte){
   //Si le panier éxiste
   if (creation())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($p_article_qte > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($p_article_code,  $_SESSION['panier']['p_code']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['p_qte'][$positionProduit] = $p_article_qte ;
         }
      }
      else
      supprimer($p_article_code);
   }
   else
   echo "Un problème est survenu.";
}

function Montant(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['p_code']); $i++)
   {
      $total += $_SESSION['panier']['p_qte'][$i] * $_SESSION['panier']['p_prix'][$i];
   }
   return $total;
}

function getCommandeIdBy($article_id)
{
    $db = getDb();
    $reponse = $db->prepare('SELECT article_nom FROM articles WHERE article_id = :article_id');
    $reponse->execute(array('article_id' => $article_id));
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    return $donnees;
}

function valider($cout_panier)
{
    $db = getDb();
    $commande_user = $_SESSION['login'];
    $query = "INSERT INTO commandes(commande_user, commande_prix)
    VALUES('$commande_user', '$cout_panier')";
    $reponse = $db->prepare($query);
    $reponse->execute();
    $reponse->closeCursor();

    $reponse = $db->prepare('SELECT MAX(commande_id) FROM commandes WHERE commande_user = commande_user');
    $reponse->execute(array('commande_user' => $commande_user));
    $commande_id = $reponse->fetch();
    $reponse->closeCursor();

    for($i = 0; $i < count($_SESSION['panier']['p_code']); $i++)
    {
      $liste_code = $_SESSION['panier']['p_code'][$i];
      $liste_qte = $_SESSION['panier']['p_qte'][$i];
      $liste_prix = $_SESSION['panier']['p_prix'][$i];
      $query = "INSERT INTO listes(liste_commande, liste_code, liste_qte, liste_prix)
      VALUES('$commande_id[0]', '$liste_code', '$liste_qte', '$liste_prix')";
      $reponse = $db->prepare($query);
      $reponse->execute();
      $reponse->closeCursor();
    }
}

function supprimePanier(){
   unset($_SESSION['panier']);
}
?>
