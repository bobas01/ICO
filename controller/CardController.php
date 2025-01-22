<?php
namespace App\Controller;

use App\Models\Card;
use App\Database\Database;

class CardController {
    private $db;

    public function __construct() {
        // Vérification admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            header('Location: /login');
            exit();
        }
        $this->db = new Database();
    }

    // Liste des cartes
    public function index() {
        $query = "SELECT * FROM cards";
        $cards = $this->db->query($query);
        include 'views/cards/index.php';
    }

    // Formulaire de création
    public function create() {
        include 'views/cards/create.php';
    }

    // Enregistrement d'une nouvelle carte
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $rarity = $_POST['rarity'] ?? '';
            $type = $_POST['type'] ?? '';

            // Validation basique
            if (empty($name)) {
                $_SESSION['error'] = "Le nom est obligatoire";
                header('Location: /cards/create');
                exit();
            }

            // Préparation de la requête
            $query = "INSERT INTO cards (name, description, rarity, type) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            
            try {
                $stmt->execute([$name, $description, $rarity, $type]);
                $_SESSION['success'] = "Carte créée avec succès";
                header('Location: /cards');
                exit();
            } catch (\PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la création : " . $e->getMessage();
                header('Location: /cards/create');
                exit();
            }
        }
    }

    // Formulaire d'édition
    public function edit($id) {
        $query = "SELECT * FROM cards WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $card = $stmt->fetch();

        if (!$card) {
            $_SESSION['error'] = "Carte non trouvée";
            header('Location: /cards');
            exit();
        }

        include 'views/cards/edit.php';
    }

    // Mise à jour de la carte
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $rarity = $_POST['rarity'] ?? '';
            $type = $_POST['type'] ?? '';

            // Validation basique
            if (empty($name)) {
                $_SESSION['error'] = "Le nom est obligatoire";
                header("Location: /cards/edit/{$id}");
                exit();
            }

            // Préparation de la requête
            $query = "UPDATE cards SET name = ?, description = ?, rarity = ?, type = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            
            try {
                $stmt->execute([$name, $description, $rarity, $type, $id]);
                $_SESSION['success'] = "Carte mise à jour avec succès";
                header('Location: /cards');
                exit();
            } catch (\PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la mise à jour : " . $e->getMessage();
                header("Location: /cards/edit/{$id}");
                exit();
            }
        }
    }

    // Suppression de la carte
    public function delete($id) {
        $query = "DELETE FROM cards WHERE id = ?";
        $stmt = $this->db->prepare($query);
        
        try {
            $stmt->execute([$id]);
            $_SESSION['success'] = "Carte supprimée avec succès";
        } catch (\PDOException $e) {
            $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
        }
        
        header('Location: /cards');
        exit();
    }
}
