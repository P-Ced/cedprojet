<?php
require 'db.php';

function getUser($login) {
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM users WHERE user_pseudo = :login');
    $reponse->execute(array('login' => $login));
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    return $donnees;
}

function getUsers() {
    $db = getDb();
    $reponse = $db->query('SELECT * FROM users');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor();
    return $donnees;
}

function getPassword($mdp) {
  $db = getDb();
  $reponse = $db->query('SELECT user_password FROM users WHERE user_mdp = :mdp');
  $reponse->execute(array('mdp' => $mdp));
  $donnees = $reponse->fetch();
  $reponse->closeCursor();
  return $donnees;
}

function getUserById($id) {
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM users WHERE user_id = :id');
    $reponse->execute(array('id' => $id));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function setUser($id, $values) {
    $query = 'UPDATE users SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1).' WHERE user_id = :id;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array_merge(array('id' => $id), $values));
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function deleteUser($id) {
    $db = getDb();
    $reponse = $db->prepare('DELETE FROM users WHERE user_id = :id;');
    $reponse->execute(array('id' => $id));
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function newUser($nom, $prenom, $email, $adresse, $pseudo, $mdp) {
    $db = getDb();
    $query = "INSERT INTO users (user_nom, user_prenom, user_email, user_adresse, user_type, user_pseudo, user_mdp) VALUES('$nom', '$prenom', '$email', '$adresse', '2', '$pseudo', '$mdp')";
    $reponse = $db->prepare($query);
    $reponse->execute();
    $reponse->closeCursor(); // Termine le traitement de la requête
}

?>
