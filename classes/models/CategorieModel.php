<?php


class CategorieModel {
private $id; // represente le code de la catégorie 
private $nom;
public function __construct($id,$nom){

$this->id= $id;
$this->nom= $nom;


}
// les getters 
public function getId() {

    return $this->id;

}
public function getNom() {

    return $this->nom;

}
// les setters 
public function setId($id) {

    $this->id=$id;
    
}
public function setNom($nom) {

   $this->nom= $nom;
  
}


}
?>