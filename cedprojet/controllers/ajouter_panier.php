<?php
require 'models/panier.php';
if (!empty($_SESSION['login'])) {
    if (isset($_GET['article_id'])) {
        $article = getArticleIdById($_GET['article_id']);
        ajouter($article['article_id']);
    } else {
        header('Location: erreur');
    }
}
$cat=$_GET['article_cat'];
header("location:magasin?article_cat=$cat;");
?>
