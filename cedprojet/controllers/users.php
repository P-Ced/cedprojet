<?php
require 'models/user.php';
session_start();
if(empty($_SESSION['login'])){
    header('Location: index');
    exit();
}
$user = getUsers();
include 'views/users.php';
?>
