<?php

require_once( '..\modele\modele.php' );
session_start();

class manager{

    public function Connexion($user) {
      $bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');
      $req = $bdd->prepare('SELECT id, login, mdp, nom, prenom, age, adress, mail, admin FROM utilisateurs WHERE login = :login AND mdp = :mdp');
      $req -> execute(array(
        'login'=>$user['login'],
        'mdp'=>$user['mdp']
      ));
      $res = $req->fetch();
      var_dump($user);
      if ($res){
        $_SESSION['login'] = $res['login'];
        $_SESSION['mdp'] = $res['mdp'];
        $a = new utilisateur($res);
        header('Location: ../accueil/index.php');
      }
    }

    public function Inscription($user){

      $bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');
      $req = $bdd->prepare('INSERT INTO utilisateurs(login, mdp, nom, prenom, age, adress, mail) VALUES (:login, :mdp, :nom, :prenom, :age, :adress, :mail)');
      $req -> execute(array(
        'login'=>$user->getLogin(),
        'mdp'=>$user->getMdp(),
        'nom'=>$user->getNom(),
        'prenom'=>$user->getPrenom(),
        'age'=>$user->getAge(),
        'adress'=>$user->getAdress(),
        'mail'=>$user->getMail()
      ));
      // var_dump($user);
      header('Location: ../connexion/connexion.php');


    }

    public function Modification($modif) {

      $bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');
      $req = $bdd->prepare('UPDATE utilisateurs SET login = :login, mdp = :mdp, nom = :nom, prenom = :prenom, age = :age, adress = :adress, mail = :mail WHERE login = :Mlogin AND mdp = :Mmdp');
      $req->execute(array(
        'login'=>$modif['login'],
        'mdp'=>$modif['mdp'],
        'Mlogin' => $_SESSION["login"],
        'Mmdp' => $_SESSION["mdp"],
        'nom'=>$modif['nom'],
        'prenom'=>$modif['prenom'],
        'mail'=>$modif['mail'],
        'adress'=>$modif['adress'],
        'age'=>$modif['age']
      ));
      // echo $_SESSION["login"].' '.$_SESSION["mdp"];
      $_SESSION["login"] = $modif['login'];
      $_SESSION["mdp"] = $modif['mdp'];
      // var_dump($modif);
      // var_dump($req);
      header('Location: ../accueil/index.php');
    }

    // public function ModificationAdmin($modif){
    //   $bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');
    //   $req = $bdd->prepare('UPDATE utilisateur SET login = :login, mdp = :mdp, nom = :nom, prenom = :prenom, date_naissance = :date_naissance, adresse = :adresse, mail = :mail  WHERE login = :Mlogin ');
    //   $req->execute(array(
    //     'login'=>$modif['login'],
    //     'mdp'=>$modif['mdp'],
    //     'Mlogin' => $_SESSION["login"],
    //     'nom'=>$modif['nom'],
    //     'prenom'=>$modif['prenom'],
    //     'mail'=>$modif['mail'],
    //     'adresse'=>$modif['adresse'],
    //     'date_naissance'=>$modif['date_naissance']
    //   ));
    //
    //   header('Location: ../accueil/index.php');
    // }


    public function reservation($resa){

      $bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');
      $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE login = :login AND mdp = :mdp');
      $req->execute(array(
        'login'=>$_SESSION['login'],
        'mdp'=>$_SESSION['mdp']
      ));
      $t1 = $resa['etudiant']*7.50;
      $t2 = $resa['navigo']*5;
      $t3 = $resa['normal']*8;
      $t4 = $resa['enfant']*11;
      $pt = $t1+$t2+$t3+$t4;
      $res = $req->fetch();
        foreach ($res as $key => $value) {
          $id = $value;
        }
      $req = $bdd->prepare('INSERT INTO reservations (etudiant, navigo, normal, enfant, prix_total, paiement, id_films, id_utilisateurs) VALUES (:etudiant, :navigo, :normal, :enfant, :prix_total, :paiement, :id_films, :id_utilisateurs)');
      $req->execute(array(
        'etudiant'=>$resa['etudiant'],
        'navigo'=>$resa['navigo'],
        'normal'=>$resa['normal'],
        'enfant'=>$resa['enfant'],
        'prix_total'=>$pt,
        'paiement'=>$resa['paiement'],
        'id_films'=>$resa['id'],
        'id_utilisateurs'=>$id
      ));
      var_dump($req);
    }



  }


?>
