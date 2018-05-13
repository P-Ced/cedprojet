<?php
require 'models/articles.php';
include 'includes/layout.php';
if (isset($_POST)) {
    if ((isset($_POST['suprimer_article']) || !empty($_POST['suprimer_article']) && $_SESSION['type']) == 2) {
        suprimerArticle($_POST['suprimer_article']);
    }
}
$cat=$_GET['article_cat'];
header("location: " .$_SERVER["HTTP_REFERER"]);
?>
