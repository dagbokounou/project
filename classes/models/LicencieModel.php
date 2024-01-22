<?php
class LicencieModel {
    // les attributs de la classe 
private $id;// numero du licencié 
private $nom;// nom ----
private $prenom;// premon---
 
private $contact ;
private $categorie;
public function __construct($id,$nom,$prenom,$contact,$categorie)
{

    $this->id= $id;
    $this ->nom= $nom;
    $this-> prenom= $prenom;
    $this->contact=$contact;
    $this->categorie=$categorie;
}
// les getters
public function getID (){
    return $this->id;
}

public function getNom (){
    return $this->nom;
}

public function getCategorie(){
    return $this->categorie;
}

public function getPrenom (){
    return $this->prenom;
}
public function getContact (){
    return $this->contact;
}
// les setters
public function setID ($id){
    $this->id=$id;
}
public function setCategorie ($categorie){
    $this->categorie=$categorie;
}

public function setNom ($nom){
    $this->nom=$nom;
}

public function setPrenom ($prenom){
    $this->prenom=$prenom;
}

public function setContact ($contact){
    $this->contact=$contact;
}


}
?>