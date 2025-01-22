<?php
<<<<<<< Updated upstream
session_start();
?>
<nav>
    <div class="container">
        <img src="img/logo/logo.png" alt="Logo" class="logo">
        <ul>
            <li>
                <a href="index.php">
                    <img src="./img/home.png" alt="" class="nav-icon">
                    Accueil
                </a>
            </li>
            <li>
                <a href="./Pages/reglesdejeux.php">
                    <img src="./img/regle.png" alt="" class="nav-icon">
                    Règles des jeux
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="./img/contact.png" alt="" class="nav-icon">
                    Contact
                </a>
            </li>
        </ul>
        <div class="icons">
            <a href="index.php">
                <img src="./img/tresor.png" alt="" class="icon">
            </a>
            <div class="dropdown">
<<<<<<< Updated upstream
                <img src="img/logo/compte.png" alt="Compte" class="icon dropbtn">
=======
 // Assurez-vous d'ajouter cette ligne en début de fichier
?>
<nav>
    <div class="container">
        <!-- Logo -->
        <img src="../img/logo/logo.png" alt="Logo" class="logo">
        
        <!-- Hamburger icon (visible sur petits écrans) -->
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Menu -->
        <ul>
            <li><a href="/ICO/">Accueil</a></li>
            <li><a href="./Pages/règles_du_jeu">Règles des jeux</a></li>
            <li><a href="./Pages/contact">Contact</a></li>
        </ul>

        <!-- Icons (visible sur tous les écrans) -->
        <div class="icons">
            <a href="index.php">
                <img src="img/logo/compte.png" alt="Compte" class="icon">
>>>>>>> Stashed changes
=======
                <img src="./img/perroquet.png" alt="" class="icon dropbtn">
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            </a>
            <a href="index.php">
                <img src="img/logo/panier.webp" alt="Panier" class="icon">
            </a>
=======
            </div>
>>>>>>> Stashed changes
        </div>
    </div>
</nav>
<<<<<<< Updated upstream
=======
<link rel="stylesheet" href="../css/style.css">

>>>>>>> Stashed changes
