<?php
require 'models/articles.php';
    function creation($db)
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
    }
    function ajouter($article){

       //Si le panier existe
       if (creation())
       {
          //Si le produit existe déjà on ajoute seulement la quantité
          if (isset($_SESSION['panier']['$article']))
          {
             $_SESSION['panier']['article']++;
          }
          else
          {
             //Sinon on ajoute le produit
             array_push( $_SESSION['panier']['article'] = 1);
          }
       }
       else
       echo "Un problème est survenu.";
    }
    function total()
    {
        $tva = 21/100;
        $prixHT = 0;
        $articles = array_keys($_SESSION['panier']);
        if (empty($articles)) {
            $article = array();
        } else {
            $article = articlePanierIdPrice($articles);
        }
        foreach ($article as $article) {
            $prixHT += $article->article_prix * $_SESSION['panier'][$article->article_id];
        }
        $TVA = ($prixHT*$tva);
        $prixTTC  = $prixHT + $TVA;
        return $prixTTC;
    }
?>
