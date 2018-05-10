<?php
require 'db.php';

function getArticle()
{
    $db = getDb();
    $req = $DB->db->prepare('SELECT * FROM articles');
    $req->execute();
    return $req->fetchAll();
}
function getArticleByCat($article_cat)
{
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM articles WHERE article_cat = :article_cat');
    $reponse->execute(array('article_cat' => $article_cat));
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor();
    return $donnees;
}
function searchArticle($data)
{
    $db = getDb();
    $value = "%$data%";
    if (isset($value)) {
        $reponse = $db->prepare('SELECT * FROM articles WHERE article_nom LIKE  ?');
        $reponse->execute([$value]);
        $donnees = $reponse->fetchAll();
        $reponse->closeCursor();
        return $donnees;
    } else {
        return null;
    }
}
function newArticle($nom, $image, $description, $prix, $code, $cat)
{
    $db = getDb();
    $query = "INSERT INTO articles(article_nom, article_image, article_description, article_prix, article_code, article_cat)
    VALUES('$nom', '$image', '$description', $prix, '$code', $cat)";
    $reponse = $db->prepare($query);
    $reponse->execute();
    $reponse->closeCursor();
    return $reponse;
}
function getArticleByCode($article_code)
{
    $db = getDb();
    $reponse = $db->prepare('SELECT article_code FROM articles WHERE article_code = :article_code');
    $reponse->execute(array('article_code' => $article_code));
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    return $donnees;
}
function getArticleById($article_id)
{
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM articles WHERE article_id = :article_id');
    $reponse->execute(array('article_id' => $article_id));
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    return $donnees;
}
function suprimerArticle($article_id)
{
    $db = getDb();
    $reponse = $db->prepare('DELETE FROM articles WHERE article_id = :article_id');
    $reponse->execute(array('article_id' => $article_id));
    $reponse->closeCursor();
}
function suprimerArticleFromPanier($article_id)
{
    unset($_SESSION['panier'][$article_id]);
}
function updateArticle($id, $nom, $image, $description, $prix, $code, $cat)
{
    $db = getDb();
    $reponse = $db->prepare('UPDATE articles SET article_nom =:article_nom, article_prix = :article_prix, article_code = :article_code, article_image = :article_image, article_description = :article_description, article_cat = :article_cat WHERE article_id = :article_id ');
    $reponse->execute(array('article_id' => $id, 'article_nom' => $nom, 'article_image' => $image, 'article_description' => $description, 'article_prix' => $prix, 'article_isbn' => $code, 'article_cat' => $cat));
}
?>
