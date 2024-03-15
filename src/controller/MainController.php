<?php

class Mainpage extends Controller
{
    public function index()
    {

        if (isset($_POST['postBtn'])) {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $author_id = $_SESSION['id'];
            var_dump($author_id);

            if (preg_match('/^[a-zA-Z]+$/', $title) && (preg_match('/^[a-zA-Z]+$/', $content))) {
                $post =  Post::addPost($title, $author_id , $content);
                var_dump($post);
            } else {
                echo "L'adresse e-mail n'est pas valide.";
            }
        }
        require(__DIR__ . "/../../views/mainPage.php");


        // if (isset($_POST['logout'])) {
        //     DbConnect::getInstance() === null;
        //     header('location:/register.php');

        //     };
    }
}
