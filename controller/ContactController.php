<?php
namespace App\Controller;

use App\Model\ContactModel;
use Exception;

class ContactController extends Controller {

    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }

    public function index() {
        $pageTitle = "Contact - ICO Board Game";
        $this->renderPage('contact/index', $pageTitle);
    }

    public function sendMail() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $mail = $_POST['mail'] ?? '';
            $message = $_POST['message'] ?? '';
    
            if (empty($name) || empty($mail) || empty($message)) {
                echo json_encode(['success' => false, 'message' => "Tous les champs sont obligatoires."]);
            } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['success' => false, 'message' => "L'adresse e-mail n'est pas valide."]);
            } else {
                try {
                    $this->contactModel->insertMessage($name, $mail, $message);
    
                    $to = 'votre@email.com';
                    $subject = 'Nouveau message de contact';
                    $headers = "From: $mail\r\nReply-To: $mail\r\n";
                    $messageToSend = "Nom : $name\nEmail : $mail\n\nMessage :\n$message";
    
                    if (mail($to, $subject, $messageToSend, $headers)) {
                        echo json_encode(['success' => true, 'message' => "Message envoyé avec succès"]);
                    } else {
                        echo json_encode(['success' => false, 'message' => "Échec de l'envoi du message"]);
                    }
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'message' => "Une erreur est survenue : " . $e->getMessage()]);
                }
            }
            exit; // Arrêter l'exécution après avoir envoyé la réponse JSON
        }
    
        // Si ce n'est pas une requête POST, rediriger vers la page de contact
        header('Location: /contact');
        exit;
    }

    
}
