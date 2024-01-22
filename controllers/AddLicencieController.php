<?php
class AddLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de licencie
        include('views/add_licencie.php'); 
    }
    
    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $contact = $_POST['contact'];
            $categorie = $_POST['categorie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet LicencieModel avec les données du formulaire
            $nouveauLicencie = new LicencieModel($nom, $prenom, $contact, $categorie);

            // Appeler la méthode du modèle (licencieDAO) pour ajouter le licencie
            if ($this->licencieDAO->create($nouveauLicencie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de licencie
                echo "Erreur lors de l'ajout du licencie .";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de licencie
        include('views/add_licencie.php');
    }
}




?>

