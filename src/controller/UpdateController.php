<?php

class UpdateController extends Controller
{
    public function index()
    {
      var_dump($_POST);
        if (isset($_POST['upBtn'])) {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $post_id = $_POST['upBtn'];
            $author_id = $_POST['author'];
            if ($author_id) {
                Post::updatePost($title , $author_id,  $post_id , $content);
                header("location:/");
            }
        else {
           echo  "Vous ne pouvez modifier que vos propres post";
        }
        }

        require(__DIR__ . "/../../views/update.php");
    }
}
