<?php
<<<<<<< Updated upstream
session_start();
=======
// Début de session (important pour les messages flash)

>>>>>>> Stashed changes

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
        $check_email = $conn->prepare("SELECT * FROM User WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Cet email est déjà utilisé.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO User (name, email, password, phoneNumber) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $hashed_password, $phone);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Inscription réussie !";
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Erreur lors de l'inscription : " . $conn->error;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - ICO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('Include/header.php'); ?>
    <?php include('Include/navbar.php'); ?>

    <div class="wrapper">
        <h1>Inscription</h1>
        
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert error'>" . htmlspecialchars($_SESSION['error']) . "</div>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "<div class='alert success'>" . htmlspecialchars($_SESSION['success']) . "</div>";
            unset($_SESSION['success']);
        }
        ?>

        <section class="login-container">
            <div>
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                    
                    <label for="emailAddress">Email</label>
                    <input id="emailAddress" type="email" name="email" placeholder="Votre email" required>
                    
                    <label for="phone">Numéro de téléphone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                    
                    <label for="confirm_password">Confirmer le mot de passe</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmez votre mot de passe" required>
                    
                    <button type="submit">S'inscrire</button>
                </form>
            </div>
        </section>
    </div>

    <?php include('Include/footer.php'); ?>
    
    <script src="../js/script.js"></script>
</body>
</html>
