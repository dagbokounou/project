<?php


class CategorieDAO {

private $connexion;


public function __construct(Connexion $connexion){

    $this->connexion=$connexion;
}
// la methode qui suit permet d'ajouter des catégories 
public function create(CategorieModel $categorie)
{

    try{
   $requete= $this->connexion->pdo->prepare("INSERT INTO categories(id,nom) VALUES (?,?)");
   $requete->execute([$categorie->getId(),$categorie->getNom()]);
return true;
}

catch (PDOException $e) {
    // GÃ©rer les erreurs d'insertion ici
    return false;
}
}

// modifier une categorie
public function update(CategorieModel $categorie){

try{

    $requete= $this->connexion->pdo->prepare("UPDATE categories SET nom=? WHERE id=?");
    $requete->execute([$categorie->getId(),$categorie->getNom()]);
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
        $requete = $this->connexion->pdo->prepare("DELETE FROM categories WHERE id = ?");
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
        $requete = $this->connexion->pdo->query("SELECT * FROM categories");
        $categories = [];

        while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = new CategorieModel($row['id'],$row['nom']);
        }

        return $categories;
    } catch (PDOException $e) {
       
        return [];
    }
}


}


?>




