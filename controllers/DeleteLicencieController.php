
<?php
class DeleteLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO= $licencieDAO;
    }

    public function deleteLicencie($licencieID) {
        // Récupérer le licencie à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getId($licencieID);

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le licencie en appelant la méthode du modèle (licencieDAO)
            if ($this->licencieDAO->deleteById($licencieID)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs de suppression de licencie
                echo "Erreur lors de la suppression de licencie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression de licencie
        include('views/delete_licencie.php');
    }
}