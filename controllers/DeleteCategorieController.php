
<?php
class DeleteCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteContact($categorieID) {
        // Récupérer la categorie à supprimer en utilisant son ID
        $categorie = $this->categorieDAO->getId($categorieID);

        if (!$categorie) {
            // La categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La categorie  n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer la categorie en appelant la méthode du modèle (CategorieDAO)
            if ($this->categorieDAO->deleteById($categorieID)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs de suppression de la categorie
                echo "Erreur lors de la suppression de la categorie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression de la categorie
        include('views/delete_categorie.php');
    }
}