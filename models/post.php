<?php

class Post
{
    protected string $title;
    protected string $author_id;
    protected string $content;




    public function __construct(string $title, string $author_id, string $content)
    {
        $this->title = $title;
        $this->author_id = $author_id;
        $this->content = $content;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public static function addPost($title, $author_id, $content)
    {
        $db = DbConnect::getInstance();
        $query = $db->prepare('INSERT INTO post(title , author , content) VALUES(? , ? , ?) ');
        $query->execute([$title, $author_id, $content]);

        return new Post($title, $author_id, $content);
    }

    public function updatePost($title, $author, $content)
    {
        $db = DbConnect::getInstance();
        $codeSQL = $db->prepare('UPDATE post SET `title` = :title , `author` = :author , `content` = :contrnt  WHERE `post_id`=:post_id');
        $codeSQL->bindParam(':title', $title);
        $codeSQL->bindParam(':author', $author);
        $codeSQL->bindParam(':content', $content);
        $codeSQL->bindParam(':id', $id);
        $codeSQL->execute();
    }
}
