
<nav>
    <div class="container">
        <img src="img/logo/logo.png" alt="Logo" class="logo">
        <ul>
            <li>
                <a href="/ICO/">
                    <img src="./img/home.png" alt="" class="nav-icon">
                    Accueil
                </a>
            </li>
            <li>
                <a href="/ICO/regles_du_jeu">
                    <img src="./img/regle.png" alt="" class="nav-icon">
                    Règles des jeux
                </a>
            </li>
            <li>
                <a href="/ICO/contact">
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
                <img src="./img/perroquet.png" alt="" class="icon dropbtn">
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
            </a>
         
        </div>
    </div>
</nav>

