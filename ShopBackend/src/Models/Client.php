<?php

class Client implements JsonSerializable
{
    private $id;
    private $nom;
    private $prenom;
    private $sexe;
    private $adresse;
    private $ville;
    private $codepostal;
    private $email;
    private $login;
    private $telephone;
    private $password;

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
      }
    
      public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
    }

    public function __construct($data) 
    {
        $this->nom = $data['nom'] ?? false;
        $this->prenom = $data['prenom'] ?? false;
        $this->sexe = $data['sexe'] ?? false;;
        $this->adresse = $data['adresse'] ?? false;
        $this->ville = $data['ville'] ?? false;
        $this->codepostal = $data['codepostal'] ?? false;
        $this->email = $data['email'] ?? false;
        $this->login = $data['login'] ?? false;
        $this->telephone = $data['telephone'] ?? false;
        $this->password = $data['password'] ?? false;
    }


    public function jsonSerialize()
    {
        return array(
            'nom' => $this->nom,
            'prenom'=> $this->prenom,
            'sexe' => $this->sexe,
            'adresse' => $this->adresse,
            'ville' => $this->ville,
            'codepostal' => $this->codepostal,
            'email' => $this->email,
            'login' => $this->login,
            'telephone' => $this->telephone,
            'password' => $this->password,
        );
    }
}