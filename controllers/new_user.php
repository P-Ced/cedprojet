<?php
require 'models/user.php';
session_start();
if(empty($_SESSION['login'])){
    header('Location: index');
    exit();
}

if(!empty($_POST['login']))
{
    if ($_POST['password'] === $_POST['passwordconfirm']){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $login = $_POST['login'];
        $values = array('login' => $login, 'password' => $password);
        $user = newUser($_POST['id'], $values);
        header('Location: users');
        exit();
    }
}
?>
