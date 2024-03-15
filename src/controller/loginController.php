<?php

class LoginController extends Controller
{
    public function index()
    {
        if (isset($_POST['connectBtn'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $password = htmlspecialchars($_POST['password']);

            if (preg_match("/^[a-zA-Z0-9\.\_\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/", $mail)) {
                $user = User::connectUser($mail, $password);
                if ($user ) {
                    header("location:/");
                }
               
            }
            else {
                echo "L'adresse e-mail n'est pas valide.";
            }
        }
        require(__DIR__ . "/../../views/login.php");


     
    }
}
