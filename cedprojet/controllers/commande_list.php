<?php
session_start();
require 'models/commandes.php';
if (!empty($_SESSION['login'])) {
  if ($_SESSION['type'] == 2 ) {
    $commandes = getCommandes();
    $f_commandes = array();
    include 'views/commande_list.php';
  }
}
?>
