<?php
class ViewContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($contactNom) {
        // Récupérer le contact à afficher en utilisant son nom
        $contact = $this->contactDAO->getNom($contactNom);

        // Inclure la vue pour afficher les détails du contact
        include('views/view_contact.php');
    }
}



?>

