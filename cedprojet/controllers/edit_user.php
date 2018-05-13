<?php
require 'models/user.php';
session_start();
if(!empty($_GET['user_id']) && $_SESSION['type'] == 2) {
    $user = getUserbyId($_GET['user_id']);
}
else{
  header('location: index');
  exit();
}
$ERROR = array("update" => "");
$update_pseudo = isset($_POST['update_pseudo']) ? $_POST['update_pseudo'] : "";
$update_nom = isset($_POST['update_nom']) ? $_POST['update_nom'] : "";
$update_prenom = isset($_POST['update_prenom']) ? $_POST['update_prenom'] : "";
$update_adresse = isset($_POST['update_adresse']) ? $_POST['update_adresse'] : "";
$update_email = isset($_POST['update_email']) ? $_POST['update_email'] : "";
$errMsg = '';
$update_pseudo = '';
$update_mdp = '';
$update_email = '';
if (!empty($_POST)) {
    if (isset($_POST["update-submit"])) {
        $errMsg = '';
        if (!isset($_POST['update_nom']) || empty($_POST['update_nom'])) {
            $errMsg .= "Nom vide, ";
        }
        if (strlen($_POST['update_nom']) >= 100) {
            $errMsg .= "Nom trop long, ";
        }
        if (!isset($_POST['update_prenom']) || empty($_POST['update_prenom'])) {
            $errMsg .= "Prénom vide, ";
        }
        if (strlen($_POST['update_prenom']) >= 100) {
            $errMsg .= "Pr&eacute;nom trop long, ";
        }
        if (!isset($_POST['update_email']) || empty($_POST['update_email'])) {
            $errMsg .= "Email vide, ";
        }
        if (!isset($_POST['update_adresse']) || empty($_POST['update_adresse'])) {
            $errMsg .= "Adresse vide, ";
        }
        if (!isset($_POST['update_pseudo']) || empty($_POST['update_pseudo'])) {
            $errMsg .= "Pseudo vide, ";
        }
        if (strlen($_POST['update_pseudo']) >= 50) {
            $errMsg .= "Pseudo trop long, ";
        }
        if (!isset($_POST['update_mdp']) || empty($_POST['update_mdp'])) {
            $errMsg .= "mdp vide, ";
        }
        if (!isset($_POST['confirm_mdp']) || empty($_POST['update_mdp'])) {
            $errMsg .= "mdp de verification vide, ";
        }
        if ($_POST['update_mdp'] !== $_POST['confirm_mdp']) {
            $errMsg = "Les mots de passe ne correspondent pas, ";
        }
        if (strlen($errMsg) == '') {
            $id = $_GET['user_id'];
            $login = $_POST['update_pseudo'];
            $password = password_hash($_POST['update_mdp'], PASSWORD_DEFAULT);
            $email = $_POST['update_email'];
            $name = $_POST['update_nom'];
            $firstname = $_POST['update_prenom'];
            $adresse = $_POST['update_adresse'];
            updateUser($id, $name, $firstname, $email, $adresse, $login, $password);
            ?><script language="javascript">if(!alert("modifier!")){history.back();}</script><?php
          }
          else{
            $ERROR["profil"] =$errMsg;
            ?><script language="javascript">alert("<?=$ERROR["profil"]?>")</script><?php
          }
    }
}
include 'views/edit_user.php';
?>
