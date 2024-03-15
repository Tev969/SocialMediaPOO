<?php
//J'importe tous mes Controller et tous mes Model
require_once(__DIR__ . "/../src/controller/parentController.php");
require_once(__DIR__ . "/../src/controller/loginController.php");
require_once(__DIR__ . "/../src/controller/MainController.php");
require_once(__DIR__ . "/../src/controller/RegisterController.php");
require_once(__DIR__ . "/../models/dbConnect.php");
require_once(__DIR__ . "/../models/user.php");
require_once(__DIR__ . "/../models/post.php");
require_once(__DIR__ . "/../core/rooter.php");

try {
    session_start();
    //Je crée un objet de mon routeur
    $app = new Router();
    //J'appelle la fonction qui gère les routes (donc qui renvoie l'utilisateur vers le bon controller)
    $app->start();
    
    // Si l'utilisateur est connecté (par exemple, après une connexion réussie)
    if (isset($author_id)) {
        // Créer un cookie pour stocker l'identifiant de l'utilisateur
        setcookie('user_id', $author_id, time() + (86400 * 30), "/"); // cookie valable pendant 30 jours
    }
} catch (PDOException $e) {
    die($e->getMessage());
}

// Vérifier si l'utilisateur est connecté à chaque chargement de page
if (isset($_COOKIE['user_id'])) {
    // L'utilisateur est connecté
    // Vous pouvez récupérer son identifiant depuis le cookie et effectuer des actions en conséquence
    $user_id = $_COOKIE['user_id'];
} else {
    // L'utilisateur n'est pas connecté
    // Vous pouvez rediriger l'utilisateur vers la page de connexion ou afficher un message d'erreur
}

?>