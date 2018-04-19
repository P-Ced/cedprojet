<?php
require 'db.php';

function getUser($login) {
    $db = getDb();
    //$reponse = $db->query('SELECT * FROM USER WHERE login = \''.$login.'\'');
    $reponse = $db->prepare('SELECT * FROM user WHERE login = :login');
    $reponse->execute(array('login' => $login));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function getUsers() {
    $db = getDb();
    $reponse = $db->query('SELECT * FROM USER');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function getUserById($id) {
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM user WHERE id = :id');
    $reponse->execute(array('id' => $id));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function setUser($id, $values) {
    $query = 'UPDATE user SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1).' WHERE id = :id;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array_merge(array('id' => $id), $values));
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function deleteUser($id) {
    $db = getDb();
    $reponse = $db->prepare('DELETE FROM USER WHERE id = :id;');
    $reponse->execute(array('id' => $id));
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function newUser($id, $values) {
    $query = 'INSERT INTO user SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1);
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute($values);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

?>
