<?php



$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ICO';

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if ($conn->query($sql) === TRUE) {
    echo "Base de données '$dbname' créée avec succès.\n";
} else {
    die("Erreur lors de la création de la base de données : " . $conn->error);
}

$conn->select_db($dbname);

$tables = [
    "User" => "CREATE TABLE IF NOT EXISTS User (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        phoneNumber VARCHAR(20),
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('user', 'admin') DEFAULT 'user',
        stripeConnectId VARCHAR(255)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Order" => "CREATE TABLE IF NOT EXISTS `Order` (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        totalPrice DECIMAL(10, 2) NOT NULL,
        IdUser INT,
        FOREIGN KEY (IdUser) REFERENCES User(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Order_Game" => "CREATE TABLE IF NOT EXISTS Order_Game (
        IdOrder INT,
        IdGame INT,
        PRIMARY KEY (IdOrder, IdGame),
        FOREIGN KEY (IdOrder) REFERENCES `Order`(Id),
        FOREIGN KEY (IdGame) REFERENCES Game(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Message" => "CREATE TABLE IF NOT EXISTS Message (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Material" => "CREATE TABLE IF NOT EXISTS Material (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        quantity INT NOT NULL,
        IdUser INT,
        FOREIGN KEY (IdUser) REFERENCES User(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Cards" => "CREATE TABLE IF NOT EXISTS Cards (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        rules TEXT,
        image VARCHAR(255),
        type ENUM('bonus', 'role', 'action') NOT NULL,
        idUser INT,
        FOREIGN KEY (idUser) REFERENCES User(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "CardsDistribution" => "CREATE TABLE IF NOT EXISTS CardsDistribution (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        players INT NOT NULL,
        pirates INT NOT NULL,
        marins INT NOT NULL,
        siren INT NOT NULL,
        idUser INT,
        FOREIGN KEY (idUser) REFERENCES User(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Events" => "CREATE TABLE IF NOT EXISTS Events (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        end_date DATE,
        idUser INT,
        FOREIGN KEY (idUser) REFERENCES User(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Posts" => "CREATE TABLE IF NOT EXISTS Posts (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        image VARCHAR(255),
        idUser INT,
        FOREIGN KEY (idUser) REFERENCES User(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Game" => "CREATE TABLE IF NOT EXISTS Game (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        StripeProductId VARCHAR(255)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "Game_Order" => "CREATE TABLE IF NOT EXISTS Game_Order (
        idGame INT,
        IdOrder INT,
        quantity INT NOT NULL,
        totalPrice DECIMAL(10, 2) NOT NULL,
        PRIMARY KEY (idGame, IdOrder),
        FOREIGN KEY (idGame) REFERENCES Game(Id),
        FOREIGN KEY (IdOrder) REFERENCES `Order`(Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci",

    "social_posts" => "CREATE TABLE IF NOT EXISTS social_posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        platform ENUM('facebook', 'instagram', 'twitter') NOT NULL,
        post_id VARCHAR(255) NOT NULL,
        message TEXT,
        author VARCHAR(255),
        post_created_at DATETIME,
        likes_count INT,
        comments_count INT,
        shares_count INT,
        media_url VARCHAR(255),
        post_url VARCHAR(255),
        hashtags TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci"
];

foreach ($tables as $tableName => $tableQuery) {
    if ($conn->query($tableQuery) === TRUE) {
        echo "Table '$tableName' créée avec succès.\n";
    } else {
        echo "Erreur lors de la création de la table '$tableName' : " . $conn->error . "\n";
    }
}

$conn->close();
?>
