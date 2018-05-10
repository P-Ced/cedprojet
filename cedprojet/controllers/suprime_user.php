<?php
require 'models/user.php';
session_start();
if(empty($_SESSION['login'])){
    header('Location: index');
    exit();
}

if(!empty($_GET['user_id']))
{
    $user = suprimerUser($_GET['user_id']);
    header('Location: users');
    exit();
}
else {
  header('Location: welcome');
}
?>
