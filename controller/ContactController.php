<?php
namespace App\Controller;

use App\Model\ContactModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
            $email = $_POST['mail'] ?? '';
            $message = $_POST['message'] ?? '';
    
            if (empty($name) || empty($email) || empty($message)) {
                echo json_encode(['success' => false, 'message' => "Tous les champs sont obligatoires."]);
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['success' => false, 'message' => "L'adresse e-mail n'est pas valide."]);
            } else {
                try {
                    $this->contactModel->insertMessage($name, $email, $message);
    
                    // Configuration de PHPMailer
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Utilisez le serveur SMTP de Gmail
                    $mail->SMTPAuth = true;
                    $mail->Username = 'alexandre.sequeira@eemi.com'; // Votre adresse e-mail
                    $mail->Password = 'Equinox01!'; // Votre mot de passe
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
    
                    // Destinataires
                    $mail->setFrom($mail->Username, $name);
                    $mail->addAddress('alexandre.sequeira@eemi.com'); // Adresse e-mail de destination
    
                    // Contenu
                    $mail->isHTML(true);
                    $mail->Subject = 'Nouveau message de contact';
                    $mail->Body    = "Nom : $name<br>Email : $email<br><br>Message :<br>$message";
    
                    $mail->send();
                    echo json_encode(['success' => true, 'message' => "Message envoyé avec succès"]);
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'message' => "Une erreur est survenue : " . $mail->ErrorInfo]);
                }
            }
            exit; // Arrêter l'exécution après avoir envoyé la réponse JSON
        }
    
        // Si ce n'est pas une requête POST, rediriger vers la page de contact
        header('Location: /contact');
        exit;
    }

    
}
