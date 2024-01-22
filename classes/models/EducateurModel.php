<?php
include('LicencieModel.php');
class EducateurModel extends LicencieModel{


// la classe educateur hérite de licencie ici donc de ses methodes et attributs non privés

    private $email;
    private $mdp;
    private $admin ;

public function __construct($id, $nom, $prenom, $contact, $categorie,$email,$mdp,$estadmin){
parent::__construct($id, $nom, $prenom, $contact, $categorie);
$this->email=$email;
$this->mdp=$mdp;
$this->estadmin=$estadmin;

}

   public function getAdmin(){
    return $this->estadmin;
}
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

    public function setAdmin($estadmin){
        $this->mdp=$estadmin;
        }
    }



?>