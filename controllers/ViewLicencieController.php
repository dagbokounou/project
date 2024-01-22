<?php
class ViewLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function viewLicencie($licencieNom) {
        // Récupérer la licence à afficher en utilisant son ID
        $licencie = $this->licencieDAO->getID($licencieId);

        // Inclure la vue pour afficher les détails de la licence
        include('views/view_licencie.php');
    }
}



?>