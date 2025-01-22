<?php
session_start();

// Vérification de la connexion (à adapter selon votre système d'authentification)
if (/* Connexion réussie */) {
    // Redirection vers la page précédente si définie, sinon vers la page d'accueil
    if (isset($_SESSION['login_redirect'])) {
        header("Location: " . $_SESSION['login_redirect']);
        unset($_SESSION['login_redirect']);
    } else {
        header("Location: index.php");
    }
    exit;
}
