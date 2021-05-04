<?php

require_once( '..\modele\modele.php' );
require_once( '..\manager\manager.php' );

// session_start();

$b = new manager();
// $a->afficher($stock);


if ($_POST['submit'] == 'Inscription') {

  $inscription = array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'login' => $_POST['login'],
    'mdp' => $_POST['mdp'],
    'age' => $_POST['age'],
    'adress' => $_POST['adress'],
    'mail' => $_POST['mail'],
  );
  $a = new utilisateur($inscription);
  $b->Inscription($a);

}

if ($_POST['submit'] == 'Connexion') {

  $connexion = array(
    'login' => $_POST['login'],
    'mdp' =>$_POST['mdp']
  );
  // $a = new utilisateur($connexion);
  $b->Connexion($connexion);

}

if ($_POST['submit'] == 'Modification') {

  $modif = array(
    'login' => $_POST['login'],
    'mdp' => $_POST['mdp'],
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mail' => $_POST['mail'],
    'adress' => $_POST['adress'],
    'age' => $_POST['age']
  );
    $b->Modification($modif);

}

// if ($_POST['submit'] == 'ModifierAdmin') {
//
//   $modif = array(
//     'login' => $_POST['login'],
//     'mdp' => $_POST['mdp'],
//     'nom' => $_POST['nom'],
//     'prenom' => $_POST['prenom'],
//     'mail' => $_POST['email'],
//     'adresse' => $_POST['adresse'],
//     'date_naissance' => $_POST['datenaissance']
//   );
//   $_SESSION['Mlogin'] = $_POST['Mlogin'];
//   $b->ModificationAdmin($modif);
//
// }
if ($_POST['submit'] == 'Réservation') {

  $resa = array(
    'etudiant' => $_POST['etudiant'],
    'navigo' => $_POST['navigo'],
    'normal' => $_POST['normal'],
    'enfant' => $_POST['enfant'],
    'paiement' => $_POST['paiement'],
    'id' => $_POST['id']
  );
  $b->reservation($resa);

}
?>
