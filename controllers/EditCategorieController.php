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

<?php
class EditContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function editContact($contactNom) {
        // Récupérer le contact à modifier en utilisant son Nom
        $contact = $this->contactDAO->getById($contactNom);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTelephone($telephone);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->contactDAO->update($contact)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:index.php?page=edit&action=editContact&nom=' . $contactNom);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('views/edit_contact.php');
    }
}


?>

