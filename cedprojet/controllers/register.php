<?php
//Set les variable à vide
$ERROR = array("REGISTER" => "");
$SUCCES = array("REGISTER" => "");
//Charge le le fichier user qui contient toutes les requete à propos des utilisateurs
require 'models/user.php';
//Condition ternaire, Si le login transmis en post est remplit alors LG_Login = $_POST['login'] si pas LG_Login="" afin que l'utilisateur ne rentre pas les données si il y a une erreur
$enreg_pseudo = isset($_POST['enreg_pseudo']) ? $_POST['enreg_pseudo'] : "";
$enreg_nom = isset($_POST['enreg_nom']) ? $_POST['enreg_nom'] : "";
$enreg_prenom = isset($_POST['enreg_prenom']) ? $_POST['enreg_prenom'] : "";
$enreg_adresse = isset($_POST['enreg_adresse']) ? $_POST['enreg_adresse'] : "";
$enreg_email = isset($_POST['enreg_email']) ? $_POST['enreg_email'] : "";
//Set les variable à vide afin de prévenir des erreurs
$enreg_pseudo = '';
$enreg_mdp = '';
$enreg_email = '';
$errMsg = '';
// Test de l'envoi du formulaire
if (empty($_SESSION)) {
    if (!empty($_POST)) {
        if (isset($_POST["register-submit"])) {
            $errMsg = '';
            if (!isset($_POST['enreg_nom']) || empty($_POST['enreg_nom'])) {
                $errMsg .= "<li>Nom vide</li>";
            }
            if (strlen($_POST['enreg_nom']) >= 100) {
                $errMsg .= "<li>Nom trop long</li>";
            }
            if (!isset($_POST['enreg_prenom']) || empty($_POST['enreg_prenom'])) {
                $errMsg .= "<li>Pr&eacute;nom vide</li>";
            }
            if (strlen($_POST['enreg_prenom']) >= 100) {
                $errMsg .= "<li>Pr&eacute;nom trop long</li>";
            }
            if (!isset($_POST['enreg_email']) || empty($_POST['enreg_email'])) {
                $errMsg .= "<li>Email vide</li>";
            }
            if (!isset($_POST['enreg_adresse']) || empty($_POST['enreg_adresse'])) {
                $errMsg .= "<li>Adresse vide</li>";
            }
            if (!isset($_POST['enreg_pseudo']) || empty($_POST['enreg_pseudo'])) {
                $errMsg .= "<li>Login vide</li>";
            }
            if (strlen($_POST['enreg_pseudo']) >= 50) {
                $errMsg .= "<li>Login trop long</li>";
            }
            $usertest = getUser($_POST['enreg_pseudo']);
            if ($usertest) {
                $errMsg .= "<li>Login d&eacute;ja existant</li>";
            }
            if (!isset($_POST['enreg_mdp']) || empty($_POST['enreg_mdp'])) {
                $errMsg .= "<li>Password vide</li>";
            }
            if (!isset($_POST['confirm_mdp']) || empty($_POST['enreg_mdp'])) {
                $errMsg .= "<li>Password verification vide</li>";
            }
            if ($_POST['enreg_mdp'] !== $_POST['confirm_mdp']) {
                $errMsg = "<li>Les mots de passe ne correspondent pas</li>";
            }
            if (strlen($errMsg) == '') {
                $login = $_POST['enreg_pseudo'];
                $password = password_hash($_POST['enreg_mdp'], PASSWORD_DEFAULT);
                $mail = $_POST['enreg_email'];
                $name = $_POST['enreg_nom'];
                $firstname = $_POST['enreg_prenom'];
                $adresse = $_POST['enreg_adresse'];
                newUser($name, $firstname, $mail, $adresse, $login, $password);
                $SUCCES["REGISTER"] = '<div class="alert alert-success" role="alert">enregistrer!</div>';
            }
        }
        if (strlen($errMsg) != 0) {
            $ERROR["REGISTER"] = '<div class="alert alert-danger" role="alert"><ul>' . $errMsg . '</ul></div>';
        }
    }
}
include 'views/register.php';
?>
