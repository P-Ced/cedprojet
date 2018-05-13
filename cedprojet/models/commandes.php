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
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor();
    return $donnees;
}

function getCommandeByUser($commande_user)
{
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM commandes WHERE commande_user = :commande_user');
    $reponse->execute(array('commande_user' => $commande_user));
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor();
    return $donnees;
}

function getCommandeIdByUser($commande_user)
{
    $db = getDb();
    $reponse = $db->prepare('SELECT commande_id FROM commandes WHERE commande_user = :commande_user');
    $reponse->execute(array('commande_user' => $commande_user));
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    return $donnees;
}
?>
