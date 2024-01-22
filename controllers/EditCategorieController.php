<?php
class EditCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function editContact($categorieID) {
        // Récupérer la categorie à modifier en utilisant son ID
        $categorie= $this->categorieDAO->getId($categorieID);

        if (!$categorie) {
            // La categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails de la categorie
            $categorie->setNom($nom);
            

            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour la categorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails de la categorieaprès la modification
                header('Location:index.php?page=edit&action=editCategorie&id=' . $categorieID);
                exit();
            } else {
                // Gérer les erreurs de mise à jour de la categorie
                echo "Erreur lors de la modification de la categorie .";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la categorie
        include('views/edit_categorie.php');
    }
}


?>

