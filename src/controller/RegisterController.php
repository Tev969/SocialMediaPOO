<?php

class RegisterController extends Controller
{
    public function index()
    {

        if (isset($_POST['submitBtn'])) {
            $name = htmlspecialchars($_POST['name']);
            $mail = htmlspecialchars($_POST['mail']);
            $password = htmlspecialchars($_POST['password']);
            
            if (preg_match('/^[a-zA-Z]+$/', $name) && preg_match("/^[a-zA-Z0-9\.\_\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/", $mail)) {
                User::registerUser($name, $mail, $password);
                  header("location:/login");
            }
            else {
                echo "L'adresse e-mail n'est pas valide.";
        }
        }
        require(__DIR__ . "/../../views/register.php");
    }
}
