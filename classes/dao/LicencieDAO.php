<?php


class LicencieDAO {

private $connexion;


public function __construct(Connexion $connexion){

    $this->connexion=$connexion;
}
// la methode qui suit permet d'ajouter des catégories 
public function create(LicencieModel $licencie)
{

    try{
   $requete= $this->connexion->pdo->prepare("INSERT INTO licencies(id,nom,prenom,contact,categorie) VALUES (?,?,?,?,?)");
   $requete->execute([$licencie->getId(),$licencie->getNom(),$licencie->getPrenom(),$licencie->getContact(),$licencie->getCategorie()]);
return true;
}

catch (PDOException $e) {
    // GÃ©rer les erreurs d'insertion ici
    return false;
}
}

// modifier une categorie
public function update(LicencieModel $licencie){

try{

    $requete= $this->connexion->pdo->prepare("UPDATE licencies SET nom=? WHERE id=?");
    $requete->execute([$licencie->getId(),$licencie->getNom()]);
    return true;
}
catch (PDOException $e) {
    // Gerer les erreurs de mise à jour 
    return false;
}
}

// supprimer des catégories => il nous faudra des identifiants pour cela 

public function deletebyID($id)
{


    try {
        $requete = $this->connexion->pdo->prepare("DELETE FROM licencies WHERE id = ?");
       $requete->execute([$id]);
        return true;
    } catch (PDOException $e) {
        // Gerer les erreurs de suppression ici
        return false;
    }
}

// lister les catégories
public function getAll() {
    try {
        $requete = $this->connexion->pdo->query("SELECT * FROM licencies");
        $licencies = [];

        while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
            $licencies[] = new LicencieModel($row['id'],$row['nom'],$row['prenom'],$row['contact'],$row['categorie']);
        }

        return $licencies;
    } catch (PDOException $e) {
       
        return [];
    }
}


}


?>




