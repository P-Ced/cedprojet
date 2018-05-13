<?php
require 'models/user.php';
session_start();
if(empty($_SESSION['login'])){
  if ($_SESSION['type'] == 2 ) {
    header('Location: index');
    exit();
  }
  else {
    header('Location: index');
  }
}
$user = getUsers();
include 'views/users.php';
?>
