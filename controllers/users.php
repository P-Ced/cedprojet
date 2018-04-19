<?php
require 'models/user.php';
session_start();
if(empty($_SESSION['login'])){
    header('Location: index');
    exit();
}
$users = getUsers();
include 'views/users.php';
?>
