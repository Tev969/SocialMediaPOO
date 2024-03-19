<?php

class Post
{
    protected string $title;
    protected string $author_id;
    
    protected string $author_name;
    protected string $content;




    public function __construct(string $title, string $author_name , string $author_id, string $content)
    {
        $this->title = $title;
        $this->author_name = $author_name;
        $this->author_id = $author_id;
        $this->content = $content;

    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public static function addPost($title,   $author_name, $author_id, $content)
    {
        $db = DbConnect::getInstance();
        $query = $db->prepare('INSERT INTO post(title ,  author_name , author , content) VALUES(? , ? , ? , ?) ');
        $query->execute([$title, $author_name , $author_id, $content]);
        $author_name = $_SESSION['author_name'];

        return new Post($title,  $author_name,  $author_id, $content);
    }

    public static function updatePost($title,$author_id , $post_id, $content)
    {
        $db = DbConnect::getInstance();
        $codeSQL = $db->prepare('UPDATE post SET title = "' . $title  . '" , author = "' . $author_id . '" , content = "' . $content . '"  WHERE post_id= ' . $post_id);
        $codeSQL->execute();
    }

    public static function deletePost($post_id)
    {
        $db = DbConnect::getInstance();
        $query = $db->prepare('DELETE FROM post WHERE post_id = ' . $post_id);
        $query->execute();
    }
}
