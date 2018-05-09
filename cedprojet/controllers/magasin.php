<?php
require 'models/articles.php';
//Est ce que le lien recupere bien l'id de la catgegorie
if (isset($_GET['article_cat']) && !empty($_GET['article_cat'])) {
    //Envoie des données à la bdd en sécurisant l'envoie avec htmlspécialchar et place le résultat dans la variable article
    $article = getArticleByCat(($_GET['article_cat']));
    //Si il n'y a pas d'article récuperer depuis la base de données
    if (empty($article)) {
        header('Location: erreur');
    }
    //Si il y a des articles, inclut la vue
    else {
        include 'views/magasin.php';
    }
} //Si le get n'a pas l'id
else {
    header('Location: index');
}
?>
