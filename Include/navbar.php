
<<<<<<< Updated upstream

<nav>
    <div class="container">
        <!-- Logo -->
        <img src="img/logo/logo.png" alt="Logo" class="logo">
        
        <!-- Hamburger icon (visible sur petits écrans) -->
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Menu -->
        <ul>
            <li><a href="./ICO/index.php">Accueil</a></li>
            <li><a href="./Pages/reglesdejeux.php">Règles des jeux</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <!-- Icons (visible sur tous les écrans) -->
        <div class="icons">
            <a href="index.php">
                <img src="img/logo/compte.png" alt="Compte" class="icon">
            </a>
            <a href="index.php">
                <img src="img/logo/panier.webp" alt="Panier" class="icon">
            </a>
        </div>
    </div>
</nav>
=======
<link rel="stylesheet" href="../css/style.css">

<?php
session_start(); // Assurez-vous d'ajouter cette ligne en début de fichier
?>
<nav>
    <div class="container">
        <img src="img/logo/logo.png" alt="Logo" class="logo">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="./Pages/reglesdejeux.php">Règles des jeux</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="icons">
            <div class="dropdown">
                <img src="img/logo/compte.png" alt="Compte" class="icon dropbtn">
                <div class="dropdown-content">
                    <?php
                    if(isset($_SESSION['user_id'])) {
                        echo '<a href="profil.php">Mon Profil</a>';
                        echo '<a href="logout.php">Déconnexion</a>';
                    } else {
                        echo '<a href="register.php">Inscription</a>';
                        echo '<a href="login.php">Connexion</a>';
                    }
                    ?>
                </div>
            </div>
            <a href="index.php">
                <img src="img/logo/panier.webp" alt="Panier" class="icon">
            </a>
        </div>
    </div>
</nav>


    <script src="../js/script.js"></script>
    
</nav>



>>>>>>> Stashed changes
