<?php

  class utilisateur {

    protected $id;
    protected $login;
    protected $mdp;
    protected $age;
    protected $nom;
    protected $prenom;
    protected $adress;
    protected $mail;
    protected $admin;

    public function __construct(array $donnes){

      $this->hydrate($donnes);

    }

    public function hydrate(array $donnes){

      foreach ($donnes as $key=>$value ){

        $methode = 'set'.ucfirst($key);
        if(method_exists($this, $methode)){

          $this->$methode($value);

        }
      }
    }

    public function afficher (array $donnes){

      foreach ($donnes as $key=>$values ){

        $methode = 'get'.ucfirst($key);
        if(method_exists($this, $methode)){

          echo ucfirst($key)." : ".$values."</br>";

        }
      }
    }

    public function setId($id){
      if ( $id > 0 ){
        $this->id = $id;
      }
    }
    public function setNom($nom){
      if (is_string($nom)){
        $this->nom = $nom;
      }
    }
    public function setPrenom($prenom){
      if (is_string($prenom)){
        $this->prenom = $prenom;
      }
    }
    public function setLogin($login){
      if (is_string($login)){
        $this->login = $login;
      }
    }
    public function setMdp($mdp){
      if (is_string($mdp)){
        $this->mdp = $mdp;
      }
    }
    public function setAge($age){
      if (is_string($age)){
        $this->age = $age;
      }
    }
    public function setAdress($adress){
      if (is_string($adress)){
        $this->adress = $adress;
      }
    }
    public function setMail($mail){
      if (is_string($mail)){
        $this->mail = $mail;
      }
    }
    public function setAdmin($admin){
      if (is_string($admin)){
        $this->admin = $admin;
      }
    }


    public function getId(){
      return $this->id;
    }
    public function getNom(){
      return $this->nom;
    }
    public function getPrenom(){
      return $this->prenom;
    }
    public function getLogin(){
      return $this->login;
    }
    public function getMdp(){
      return $this->mdp;
    }
    public function getAge(){
      return $this->age;
    }
    public function getAdress(){
      return $this->adress;
    }
    public function getMail(){
      return $this->mail;
    }
    public function getAdmin(){
      return $this->admin;
    }

}
?>
