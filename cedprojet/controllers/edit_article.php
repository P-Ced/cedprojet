<?php
require 'models/articles.php';
$ERROR = array("update" => "");
$errMsg = "";
$article = getArticleById($_GET['article_id']);
if (isset($_POST["update2_submit"])) {
    if (!isset($_POST['update_nom']) || empty($_POST['update_nom'])) {
        $errMsg .= "<li>Nom de l'article vide</li>";
    }
    if (!isset($_POST['update_prix']) || empty($_POST['update_prix'])) {
        $errMsg .= "<li>Prix de l'article vide</li>";
    }
    if (!is_numeric($_POST['update_prix'])) {
        $errMsg .= "<li>Prix de l'article inccorect</li>";
    }
    if (strlen($_POST['update_code']) >= 200) {
        $errMsg .= "<li>code de l'article trop grand</li>";
    }
    if (strlen($errMsg) == 0) {
        $nom = ($_POST['update_nom']);
        $image = ($_POST['update_image']);
        $prix = ($_POST['update_prix']);
        $code = ($_POST['update_code']);
        $description = ($_POST['update_description']);
        $cat = $article['article_cat'];
        $id = $_GET['article_id'];
        updateArticle($id, $nom, $image, $description, $prix, $code, $cat);
        ?><script language="javascript">if(!alert("modifier!")){history.back();}</script><?php
      }
    }
    if (strlen($errMsg) != 0) {
        $ERROR["update"] ='<div class="alert alert-danger" role="alert"><ul>' . $errMsg . '</ul></div>';
        }
include 'views/edit_article.php';
?>
