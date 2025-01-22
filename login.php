<?php


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
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Requête préparée pour vérifier l'utilisateur
    $stmt = $conn->prepare("SELECT Id, password FROM User WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Vérification du mot de passe
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['Id'];
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Mot de passe incorrect.";
        }
    } else {
        $_SESSION['error'] = "Aucun compte trouvé avec cet email.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - ICO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('Include/header.php'); ?>
    <?php include('Include/navbar.php'); ?>

    <div class="wrapper">
        <h1>Connexion</h1>
        
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert error'>" . htmlspecialchars($_SESSION['error']) . "</div>";
            unset($_SESSION['error']);
        }
        ?>

        <section class="login-container">
            <div>
                <form action="" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Votre email" required>
                    
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                    
                    <button type="submit">Se connecter</button>
                </form>
            </div>
        </section>
    </div>

    <?php include('Include/footer.php'); ?>
</body>
</html>


