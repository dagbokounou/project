<?php
class ViewEducateurController {
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function viewEducateur($educateurId) {
        // Récupérer l'educateur'à afficher en utilisant son ID
        $educateur = $this->educateurDAO->getID($educateurId);

        // Inclure la vue pour afficher les détails de l'educateur
        include('views/view_educateur.php');
    }
}



?>