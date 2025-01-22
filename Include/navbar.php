<?php
session_start();
?>
<nav>
    <div class="container">
        <img src="img/logo/logo.png" alt="Logo" class="logo">
        <ul>
            <li>
                <a href="index.php">
                    <img src="img/icons/home.png" alt="" class="nav-icon">
                    Accueil
                </a>
            </li>
            <li>
                <a href="./Pages/reglesdejeux.php">
                    <img src="img/icons/regle.png" alt="" class="nav-icon">
                    Règles des jeux
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="img/icons/contact.png" alt="" class="nav-icon">
                    Contact
                </a>
            </li>
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
