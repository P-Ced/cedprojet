<?php
require 'models/panier.php';
function getCommandes()
{
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM commandes');
    $reponse->execute();
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor();
    return $donnees;
}

function getListeByCommandeId($liste_commande)
{
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM listes WHERE liste_commande = :liste_commande');
    $reponse->execute(array('liste_commande' => $liste_commande));
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    return $donnees;
}
?>
