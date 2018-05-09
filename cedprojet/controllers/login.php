<?php
require 'models/user.php';
$error = '';
// Test de l'envoi du formulaire
if(!empty($_POST))
{
    // Les identifiants sont transmis ?
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        $user = getUser($_POST['login']);
        // Sont-ils les mêmes que les constantes ?
        if(!$user)
        {
            $error = 'Mauvais Pseudo !';
        }
        elseif(!password_verify($_POST['password'], $user['user_mdp']))
        {
            $error = 'Mauvais mdp !';

        }
        else
        {
            // On ouvre la session
            session_start();
            // On enregistre le login en session
            $_SESSION['login'] = $user['user_pseudo'];
            $_SESSION['type'] = $user['user_type'];
            // On redirige vers le fichier index.php
            header('Location: index');
            exit();
        }
    }
    else
    {
        $error = 'Veuillez inscrire vos identifiants svp !';
    }
}
include 'views/login.php'
?>
