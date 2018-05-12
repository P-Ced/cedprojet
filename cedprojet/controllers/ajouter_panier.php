<?php
session_start();
require 'models/panier.php';
if (!empty($_SESSION['login'])) {
    if(creation()) {
        if (isset($_GET['article_id'])) {
          $p_article = getArticleById($_GET['article_id']);
          ajouter($p_article);
        } else {
          header('Location: erreur');
        }
    }
}
header("location: " .$_SERVER["HTTP_REFERER"]);
?>
