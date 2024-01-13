<?php

class EducateurModel extends LicencieModel{


// la classe educateur hérite de licencie ici donc de ses methodes et attributs non privés

    private $email;
    private $mdp;// represente le mot de passe 

public function __construct($email,$mdp){

$this->email=$email;
$this->mdp=$mdp;

}

// on pourra utiliser les méthodes de licencie car elles sont publiques 
public function getEmail(){
    return $this->email;
}

public function getMdp(){
    return $this->mdp;

}
public function setEmail($email){
$this->email=$email;
}
public function setMdp($mdp){
    $this->mdp=$mdp;
    }
}
?>