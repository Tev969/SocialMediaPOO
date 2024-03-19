<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Social</title>
</head>

<body>
    <h1>Social Network</h1>
    <div class="all">
        <h2>Home</h2>
        <p>Welcome</p>
        <button name="logout" type="submit">Logout</button>

        <div class="post">
            <h2>Titre post</h2>
            <?php
            $db = DbConnect::getInstance();
            $query = $db->prepare('SELECT title , author_name , author , content  , post_id FROM post');
            $query->execute([]);
            if ($query->rowCount() > 0) {
                // Si des résultats sont trouvés
                $donnees = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($donnees as $post) {
                    echo "Author : " . $post['author_name']. "<br>";
                    echo "Titre : " . $post['title'] . "<br>";
                    echo "Contenu : " . $post['content'] . "<br><br>";

                    echo '<form action="update" method="post">';
                    echo '<input type="hidden" name="author" value="' . $post['author'] . '">';
                    echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">';
                    echo '<button type="submit" name="update_btn">Update</button>';
                    echo '</form>';

                    echo '<form action="/" method="post">';
                    echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">';
                    echo '<button type="submit"  value=""  name="delete_btn">Delete</button>';
                    echo '</form>';

                    echo "<br><br>";
                }
            } else {
                // Si aucun résultat n'est trouvé
                echo "Aucun post trouvé !";
            }
            ?>
        </div>
        <div class="addPost">
            <h2>New post</h2>
            <form action="/" class="formConnect" method="post">
                <input type="text" name="title" id="title" placeholder="Title" required>
                <input type="text" name="content" id="content" placeholder="Content" required>
                <button name="postBtn" type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>