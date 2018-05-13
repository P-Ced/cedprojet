<?php
session_start();
require 'models/commandes.php';
if (!empty($_SESSION['login'])) {
    $commande_id = getCommandeByUser($_SESSION['login']);
    include 'views/user_commande.php';
}else {
  header('loaction: login');
}
?>
