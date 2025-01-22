<?php
session_start();

// Connexion à la base de données
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ICO';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation du mot de passe
    $password_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/";
    if (!preg_match($password_regex, $password)) {
        $_SESSION['error'] = "Le mot de passe doit contenir au moins 12 caractères, une majuscule, des minuscules, un chiffre et un caractère spécial.";
    } elseif ($password !== $confirm_password) {
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
    } else {
        // Vérification si l'email existe déjà
        $check_email = $conn->prepare("SELECT * FROM User WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Cet email est déjà utilisé.";
        } else {
            // Hachage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insertion de l'utilisateur
            $stmt = $conn->prepare("INSERT INTO User (name, email, password, phoneNumber) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $hashed_password, $phone);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Inscription réussie !";
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['error'] = "Erreur lors de l'inscription : " . $conn->error;
            }
        }
    }
}

$conn->close();
?>