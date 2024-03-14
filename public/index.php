<?php
//J'importe tous mes Controller et tous mes Model
require_once(__DIR__ . "/../src/controller/parentController.php");
require_once(__DIR__ . "/../src/controller/loginController.php");
require_once(__DIR__ . "/../src/controller/MainController.php");
require_once(__DIR__ . "/../src/controller/RegisterController.php");
require_once(__DIR__ . "/../models/dbConnect.php");
require_once(__DIR__ . "/../models/user.php");
require_once(__DIR__ . "/../core/rooter.php");

try{
    //Je crée un objet de mon routeur
   $app = new Router();
   //J'appelle la fonction qui gère les routes (donc qui renvoie l'utilisateur vers le bon controller)
   $app->start();
}
catch(PDOException $e){
    die($e->getMessage());
}
 
?>