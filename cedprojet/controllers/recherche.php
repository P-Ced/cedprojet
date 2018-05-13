<?php
session_start();
  require 'models/articles.php';
  if (isset($_GET) && !empty($_GET)) {
    $article = rechArticle($_GET['produit']);
      include 'views/magasin.php';
}
 ?>
