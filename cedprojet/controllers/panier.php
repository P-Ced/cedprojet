<?php
session_start();
require "models/panier.php";
if(!empty($_SESSION['login']))
{
if(empty($ids)){
  $article = array();
}
else {
  $article = articlePanier($ids);
}
include 'views/panier.php';
} else {
  header('location: index');
}
?>
