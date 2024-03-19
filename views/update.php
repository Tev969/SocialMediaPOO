<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Document</title>
</head>
<body>
<h2>Update post</h2>

            <form action="" class="formConnect" method="post">
                <input type="text" name="title" value="" id="title" placeholder="Title" required>
                <input type="text" name="content" id="content" placeholder="Content" required>
                <button name="upBtn" value="<?php if (isset ($_POST['post_id'])) {
                    echo $_POST['post_id'];
                }else echo $_POST['upBtn'];?>" type="submit">Submit</button>
            </form>
</body>
</html>