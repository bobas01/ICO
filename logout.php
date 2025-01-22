<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Vérification des informations d'identification (à adapter selon votre système)
    $stmt = $conn->prepare("SELECT id, password FROM User WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Connexion réussie
            $_SESSION['user_id'] = $user['id'];
            
            // Redirection vers la page précédente si définie, sinon vers la page d'accueil
            if (isset($_SESSION['login_redirect'])) {
                header("Location: " . $_SESSION['login_redirect']);
                unset($_SESSION['login_redirect']);
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Mot de passe incorrect.";
        }
    } else {
        $_SESSION['error'] = "Aucun compte trouvé avec cet email.";
    }
}
