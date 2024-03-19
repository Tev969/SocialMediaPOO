<?php

class Mainpage extends Controller
{
    public function index()
    {

        if (isset($_POST['postBtn'])) {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $author_id = $_SESSION['id'];
            $author_name = $_SESSION['author_name'];
        

            if (preg_match('/^[a-zA-Z]+$/', $title) && (preg_match('/^[a-zA-Z]+$/', $content))) {
            $post = Post::addPost($title, $author_name ,  $author_id , $content);
            } else {
                echo "L'adresse e-mail n'est pas valide.";
            }
        }

        if (isset($_POST['delete_btn'])) {
            $post_id = $_POST['post_id'];
            Post::deletePost($post_id);
        }

    

        require(__DIR__ . "/../../views/mainPage.php");


        if (isset($_POST['logout'])) {
            session_destroy();
            DbConnect::getInstance() === null;
            header('location:/register.php');

            };
    }
}
