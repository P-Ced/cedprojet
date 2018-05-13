<?php
require 'models/user.php';
session_start();
if(!empty($_SESSION['login'])){
    $user = getUser($_SESSION['login']);
}
else{
  header('location: index');
  exit();
}
$ERROR = array("profil" => "");
$profil_pseudo = isset($_POST['profil_pseudo']) ? $_POST['profil_pseudo'] : "";
$profil_nom = isset($_POST['profil_nom']) ? $_POST['profil_nom'] : "";
$profil_prenom = isset($_POST['profil_prenom']) ? $_POST['profil_prenom'] : "";
$profil_adresse = isset($_POST['profil_adresse']) ? $_POST['profil_adresse'] : "";
$profil_email = isset($_POST['profil_email']) ? $_POST['profil_email'] : "";
$errMsg = '';
$profil_pseudo = '';
$profil_mdp = '';
$profil_email = '';
if (!empty($_POST)) {
    if (isset($_POST["profil-submit"])) {
        $errMsg = '';
        if (!isset($_POST['profil_nom']) || empty($_POST['profil_nom'])) {
            $errMsg .= "<li>Nom vide</li>";
        }
        if (strlen($_POST['profil_nom']) >= 100) {
            $errMsg .= "<li>Nom trop long</li>";
        }
        if (!isset($_POST['profil_prenom']) || empty($_POST['profil_prenom'])) {
            $errMsg .= "<li>Pr&eacute;nom vide</li>";
        }
        if (strlen($_POST['profil_prenom']) >= 100) {
            $errMsg .= "<li>Pr&eacute;nom trop long</li>";
        }
        if (!isset($_POST['profil_email']) || empty($_POST['profil_email'])) {
            $errMsg .= "<li>Email vide</li>";
        }
        if (!isset($_POST['profil_adresse']) || empty($_POST['profil_adresse'])) {
            $errMsg .= "<li>Adresse vide</li>";
        }
        if (!isset($_POST['profil_mdp']) || empty($_POST['profil_mdp'])) {
            $errMsg .= "<li>mdp vide</li>";
        }
        if (!isset($_POST['confirm_mdp']) || empty($_POST['profil_mdp'])) {
            $errMsg .= "<li>mdp de verification vide</li>";
        }
        if ($_POST['profil_mdp'] !== $_POST['confirm_mdp']) {
            $errMsg = "<li>Les mots de passe ne correspondent pas</li>";
        }
        if (strlen($errMsg) == '') {
            $id = $user['user_id'];
            $login = $user['user_pseudo'];
            $password = password_hash($_POST['profil_mdp'], PASSWORD_DEFAULT);
            $email = $_POST['profil_email'];
            $name = $_POST['profil_nom'];
            $firstname = $_POST['profil_prenom'];
            $adresse = $_POST['profil_adresse'];
            updateUser($id, $name, $firstname, $email, $adresse, $login, $password);
            ?><script language="javascript">if(!alert("modifier!")){}</script><?php
        }
    }
    if (strlen($errMsg) != 0) {
        $ERROR["profil"] = '<div class="alert alert-danger" role="alert"><ul>' . $errMsg . '</ul></div>';
    }
}
include 'views/user_profile.php';
?>
