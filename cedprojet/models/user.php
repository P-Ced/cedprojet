<?php
require 'db.php';

function getUser($pseudo) {
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM users WHERE user_pseudo = :pseudo');
    $reponse->execute(array('pseudo' => $pseudo));
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
    $reponse->closeCursor();
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
    $reponse->closeCursor();
}

function suprimerUser($user_id) {
    $db = getDb();
    $reponse = $db->prepare('DELETE FROM users WHERE user_id = :user_id;');
    $reponse->execute(array('user_id' => $user_id));
    $reponse->closeCursor();
}

function newUser($nom, $prenom, $email, $adresse, $pseudo, $mdp) {
    $db = getDb();
    $query = "INSERT INTO users (user_nom, user_prenom, user_email, user_adresse, user_type, user_pseudo, user_mdp)
              VALUES('$nom', '$prenom', '$email', '$adresse', '1', '$pseudo', '$mdp')";
    $reponse = $db->prepare($query);
    $reponse->execute();
    $reponse->closeCursor();
}
function updateUser($id, $nom, $prenom, $email, $adresse, $pseudo, $mdp) {
    $db = getDb();
    $reponse = $db->prepare('UPDATE users SET user_nom = :nom, user_prenom = :prenom, user_email = :email, user_adresse = :adresse, user_pseudo = :pseudo, user_mdp = :mdp WHERE user_id = :id;');
    $reponse->execute(array('id' => $id, 'nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'adresse' => $adresse, 'pseudo' => $pseudo, 'mdp' => $mdp));
    $reponse->closeCursor();
  }

?>
