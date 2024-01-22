<?php
class EditLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieieDAO) {
        $this->licencieieDAO = $clicencieieDAO;
    }

    public function editLicencie($licencieieID) {
        // Récupérer le licencieà modifier en utilisant son ID
        $licencie= $this->licencieDAO->getId($licencieID);

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom= $_POST['prenom'];
            $contact=$_POST['contact'];
$categorie= $_POST['categorie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails de licencie
            $licencie->setNom($nom);
            $licencie-> setPrenom($prenom);
            $licencie-> setContact($contact);
            $licencie-> setCategorie($categorie);

            // Appeler la méthode du modèle (licencieieDAO) pour mettre à jour la licence
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails de la licence après la modification
                header('Location:index.php?page=edit&action=editLicencie&id=' . $licencieID);
                exit();
            } else {
                // Gérer les erreurs de mise à jour de la licence
                echo "Erreur lors de la modification de la licence .";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la categorie
        include('views/edit_licencie.php');
    }
}


?>

