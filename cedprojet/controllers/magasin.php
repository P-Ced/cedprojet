<?php
session_start();
require 'models/articles.php';
if (isset($_GET['article_cat']) && !empty($_GET['article_cat'])) {
    $article = getArticleByCat(($_GET['article_cat']));
    if (empty($article)) {
        header('Location: erreur');
    }
    else {
        include 'views/magasin.php';
    }
}
else {
    $article = getArticle();
    if (empty($article)) {
        header('Location: erreur');
    }
    else {
        include 'views/magasin.php';
    }
}
?>
