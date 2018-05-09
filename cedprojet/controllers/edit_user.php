<?php
require 'models/user.php';
session_start();
if(empty($_SESSION['login'])){
    header('Location: index');
    exit();
}

if(!empty($_POST['id']))
{
    if ($_POST['password'] === $_POST['passwordconfirm']){
        $login = $_POST['login'];
        if ($_POST['password']){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $values = array('login' => $login, 'password' => $password);
        } else {
            $values = array('login' => $login);
        }
        setUser($_POST['id'], $values);
        header('Location: users');
        exit();
    }
}
?>
