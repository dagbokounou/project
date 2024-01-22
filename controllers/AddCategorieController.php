<?php
class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO=$categorieDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('views/add_categorie.php'); 
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
           
            $nom = $_POST['nom'];
            

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouveauCategorie = new CategorieModel(0,$nom);

            // Appeler la méthode du modèle (CategorieDAO) pour ajouter la categorie
            if ($this->categorieDAO->create($nouveauCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de categorie
                echo "Erreur lors de l'ajout de la categorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('views/add_categorie.php');
    }
}




?>

