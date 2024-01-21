<?php
class ContactDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau contact dans la base de donnÃ©es
    public function create(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs ( email, mdp, estadmin) VALUES (?, ?, ?)");
            $stmt->execute([$educateur->getEmail(), $educateur->getMdp(), $educateur->getAdmin()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un educateur par son Email
    public function getById($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['email'], $row['mdp'],$row['estadmin']);
            } else {
                return null; // Aucun educ trouvé
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les educateurs
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateurs");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateurs[] = new ContactModel( $row['email'], $row['mdp'],$row['estadmin']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un educateur
    public function update(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET email = ?, mdp= ?, estadmin = ?, WHERE email = ?");
            $stmt->execute([$educateur->getEmail(), $educateur->getMdp(), $educateur->getAdmin()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un educateur par son email
    public function deleteByEmail($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM educateurs WHERE email= ?");
            $stmt->execute([$email]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
