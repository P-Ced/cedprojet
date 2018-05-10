<?php
session_start();
require 'models/articles.php';
$SUCCES = array("ajouter" => "");
$ERROR = array("ajouter" => "");
$errMsg="";
if ($_SESSION['type'] == 2) {
    if (isset($_POST["new_article"])) {
      if (!isset($_POST['article_nom']) || empty($_POST['article_nom'])) {
        $errMsg .= "<li>Nom de l'article vide</li>";
      }
      if (!isset($_POST['article_image']) || empty($_POST['article_image'])) {
        $errMsg .= "<li>lien de l'image vide</li>";
      }
      if (!isset($_POST['article_description']) || empty($_POST['article_description'])) {
        $errMsg .= "<li>description d'article vide</li>";
      }
      if (!isset($_POST['article_prix']) || empty($_POST['article_prix'])) {
        $errMsg .= "<li>Prix de l'article vide</li>";
      }
      if (!is_numeric($_POST['article_prix'])) {
        $errMsg .= "<li>le prix n'est pas un nombre</li>";
      }
      if (!isset($_POST['article_code']) || empty($_POST['article_code'])) {
        $errMsg .= "<li>le code de l'article vide</li>";
      }
      if (isset($_POST['article_code']) || !empty($_POST['article_code'])) {
        $article = getArticleByCode(($_POST['article_code']));
        if ($article) {
          $errMsg .= "<li>le code article &eacute;xiste d&eacute;ja</li>";
        }
      }
      if (!isset($_POST['article_cat']) || empty($_POST['article_cat'])) {
        $errMsg .= "<li>la cat&eacute;gorie de l'article vide</li>";
      }
    if (strlen($errMsg) == 0) {
      $nom = ($_POST['article_nom']);
      $image = ($_POST['article_image']);
      $description = ($_POST['article_description']);
      $prix = ($_POST['article_prix']);
      $code = ($_POST['article_code']);
      $cat = $_POST['article_cat'];
      newArticle($nom, $image, $description, $prix, $code, $cat);
      $SUCCES["ajouter"] = '<div class="alert alert-success" role="alert">enregistrer</div>';
    }
    elseif (strlen($errMsg) != 0) {
      $ERROR["ajouter"] = '<div class="alert alert-danger" role="alert"><ul>' . $errMsg . '</ul></div>';
    }
  }
  include 'views/new_article.php';
}
//dans le cas ou le user n'est pas admin
else {
  header('Location: about');
}
?>
