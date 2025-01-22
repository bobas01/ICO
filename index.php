<?php
session_start();

require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath('/ICO');

// Définissez vos routes ici
$router->map('GET', '/', 'HomeController#index', 'home');
$router->map('GET', '/règles_du_jeu', 'RulesController#index', 'rules');
$router->map('GET', '/contact', 'ContactController#index', 'contact');
$router->map('POST', '/contact/send', 'ContactController#sendMail', 'contact_send');
$router->map('GET', '/backoffice', 'BackOfficeController#index', 'backoffice');
$router->map('GET', '/backoffice/cartes-bonus', 'BackOfficeController#cartesBonus', 'cartes_bonus');
$router->map('GET', '/backoffice/cartes-roles', 'BackOfficeController#cartesRoles', 'cartes_roles');
$router->map('GET', '/backoffice/cartes-action', 'BackOfficeController#cartesAction', 'cartes_action');
$router->map('GET', '/backoffice/distribution-cartes', 'BackOfficeController#distributionCartes', 'distribution_cartes');
$router->map('GET', '/backoffice/materiel', 'BackOfficeController#materiel', 'materiel');
$router->map('GET', '/backoffice/evenements', 'BackOfficeController#evenements', 'evenements');
$router->map('GET', '/backoffice/jeux-extensions', 'BackOfficeController#jeuxExtensions', 'jeux_extensions');
$router->map('GET', '/backoffice/articles', 'BackOfficeController#articles', 'articles');



$match = $router->match();

if (is_array($match)) {
    $controller = $match['target'];
    list($controllerName, $actionName) = explode('#', $controller);
    $controllerName = "\\App\\Controller\\" . $controllerName;
    
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (method_exists($controller, $actionName)) {
            call_user_func_array([$controller, $actionName], $match['params']);
        } else {
            // Gérer l'erreur : méthode non trouvée
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found: Action not found";
        }
    } else {
        // Gérer l'erreur : contrôleur non trouvé
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found: Controller not found";
    }
};
//  else {
//     // Gérer l'erreur : route non trouvée
//     header("HTTP/1.0 404 Not Found");
//     echo "404 Not Found: Page not found";
// }
