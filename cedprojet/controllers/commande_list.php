<?php
session_start();
require 'models/commandes.php';
if (!empty($_SESSION['login'])) {
  if ($_SESSION['type'] == 2 ) {
    $commandes = getCommandes();
    include 'views/commande_list.php';
  }
}
?>
