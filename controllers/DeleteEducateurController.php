
<?php
class DeleteEducateurController {
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function deleteEducateur($educateurID) {
        // Récupérer l'educateur à supprimer en utilisant son ID
        $educateur = $this->educateurDAO->getId($educateurID);

        if (!$educateur) {
            // L'educateur' n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "L'educateur' n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer l'educateur en appelant la méthode du modèle (EducateurDAO)
            if ($this->educateurDAO->deleteById($educateurID)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs de suppression de l'educateur'
                echo "Erreur lors de la suppression de l'educateur.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression de l'educateur
        include('views/delete_educateur.php');
    }
}