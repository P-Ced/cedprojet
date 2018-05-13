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
$SUCCES = array("update" => "");
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
            $errMsg .= "<li>Nom vide</li>";
        }
        if (strlen($_POST['update_nom']) >= 100) {
            $errMsg .= "<li>Nom trop long</li>";
        }
        if (!isset($_POST['update_prenom']) || empty($_POST['update_prenom'])) {
            $errMsg .= "<li>Pr&eacute;nom vide</li>";
        }
        if (strlen($_POST['update_prenom']) >= 100) {
            $errMsg .= "<li>Pr&eacute;nom trop long</li>";
        }
        if (!isset($_POST['update_email']) || empty($_POST['update_email'])) {
            $errMsg .= "<li>Email vide</li>";
        }
        if (!isset($_POST['update_adresse']) || empty($_POST['update_adresse'])) {
            $errMsg .= "<li>Adresse vide</li>";
        }
        if (!isset($_POST['update_pseudo']) || empty($_POST['update_pseudo'])) {
            $errMsg .= "<li>Login vide</li>";
        }
        if (strlen($_POST['update_pseudo']) >= 50) {
            $errMsg .= "<li>Login trop long</li>";
        }
        if (!isset($_POST['update_mdp']) || empty($_POST['update_mdp'])) {
            $errMsg .= "<li>Password vide</li>";
        }
        if (!isset($_POST['confirm_mdp']) || empty($_POST['update_mdp'])) {
            $errMsg .= "<li>Password verification vide</li>";
        }
        if ($_POST['update_mdp'] !== $_POST['confirm_mdp']) {
            $errMsg = "<li>Les mots de passe ne correspondent pas</li>";
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
            $SUCCES["update"] = '<div class="alert alert-success" role="alert">modifier!</div>';
            ?><script language="javascript">alert("modifier!")</script><?php
        }
    }
    if (strlen($errMsg) != 0) {
        $ERROR["update"] = '<div class="alert alert-danger" role="alert"><ul>' . $errMsg . '</ul></div>';
    }
}
include 'views/edit_user.php';
?>
