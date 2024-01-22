<?php
class EditEducateurController {
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function editEducateur($educateurId) {
        // Récupérer l'educateur à modifier en utilisant son Nom
        $educateur = $this->educateurDAO->getById($educateurId);

        if (!$educateur) {
            // L'educateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "L'educateur  n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp= $_POST['mdp'];
            $estAdmin = isset($_POST['estadmin']) ? true : false;

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails de l'educateur 
            $educateur->setNom($nom);
            $educateur->setPrenom($prenom);
            $educateur->setEmail($email);
            $educateur->setMdp($mdp);
            $educateur->setAdmin($estAdmin);
            // Appeler la méthode du modèle (EducateurDAO) pour mettre à jour de l'educateur
            if ($this->educateurDAO->update($educateur)) {
                // Rediriger vers la page de détails de l'educateuraprès la modification
                header('Location:index.php?page=edit&action=editEducateur&nom=' . $educateurId);
                exit();
            } else {
                // Gérer les erreurs de mise à jour de l'educateur
                echo "Erreur lors de la modification du l'educateur";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de  l'educateur
        include('views/edit_educateur.php');
    }
}


?>

