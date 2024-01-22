<?php
class AddEducateurController {
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO=$educateurDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de l'educateur
        include('views/add_ceducateur.php'); 
    }
    
    public function addEducateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
           
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $motDePasse = $_POST['mdp'];
            $isAdmin = isset($_POST['estadmin']) ? true : false;
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet EducateurModel avec les données du formulaire
            $nouveauEducateur = new EducateurModel($nom, $prenom, $email, $motDePasse, $isAdmin);

            // Appeler la méthode du modèle (EducateurDAO) pour ajouter l'educateur
            if ($this->educateurDAO->create($nouveauEducateur)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de l'educateur
                echo "Erreur lors de l'ajout de l'educateur.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de l'educateur
        include('views/add_educateur.php');
    }
}




?>

