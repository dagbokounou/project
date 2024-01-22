<?php
class ViewCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function viewCategorie($contactNom) {
        // Récupérer la categorie à afficher en utilisant son ID
        $contact = $this->categorieDAO->getID($categorieId);

        // Inclure la vue pour afficher les détails de la categorie
        include('views/view_categorie.php');
    }
}



?>