<?php
require 'models/user.php';
$error = '';
if(!empty($_POST))
{
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        $user = getUser($_POST['login']);
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
            session_start();
            // enregistre le login et le type en session
            $_SESSION['login'] = $user['user_pseudo'];
            $_SESSION['type'] = $user['user_type'];
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
