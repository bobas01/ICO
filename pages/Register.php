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
    $name = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['subject']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Vérification si l'email existe déjà
    $check_email = $conn->query("SELECT * FROM User WHERE email = '$email'");
    if ($check_email->num_rows > 0) {
        echo "Cet email est déjà utilisé.";
    } else {
        // Insertion de l'utilisateur
        $sql = "INSERT INTO User (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            $user_id = $conn->insert_id;
            
            // Insertion du message
            $sql_message = "INSERT INTO Message (IdUser, totalPrice) VALUES ($user_id, 0)";
            if ($conn->query($sql_message) === TRUE) {
                echo "Inscription réussie !";
            } else {
                echo "Erreur lors de l'enregistrement du message : " . $conn->error;
            }
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Inscription</h1>
        <p>Créez votre compte ICO.</p>

        <section class="login-container">
            <div>
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Nom d'utilisateur" required="required"/>
                    
                    <label for="emailAddress">Email</label>
                    <input id="emailAddress" type="email" name="email" placeholder="Votre email" required>
                    
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Votre mot de passe" required>
                    
                    <label for="subject">Message</label>
                    <textarea id="subject" name="subject" placeholder="Votre message" style="height:200px"></textarea>
                    
                    <button type="submit">S'inscrire</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
