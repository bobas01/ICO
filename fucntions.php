<?php
// Redirection après déconnexion
add_action('wp_logout', 'custom_redirect_after_logout');
function custom_redirect_after_logout() {
    wp_redirect(home_url());
    exit();
}

// Sauvegarde de la page courante avant connexion
add_action('init', 'save_current_page');
function save_current_page() {
    if (!is_user_logged_in()) {
        $_SESSION['login_redirect'] = $_SERVER['REQUEST_URI'];
    }
}
