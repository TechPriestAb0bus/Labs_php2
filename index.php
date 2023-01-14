<?php 

require_once "config/connect.php";
require_once "config/functions.php";
global $connect;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Anonimus chat</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>


    <div class='wall'>
        <?php

        echo "<form action='".set_comment($connect)."' enctype='multipart/form-data' method='post' class='add_note'>
            <div class='add_note'>
                <div class='heading'>
                    <div class='four'><h1>Анонимный чат</h1></div>
                </div>
                <div>
                    <textarea name='title' class='note' placeholder='Заголовок'></textarea>
                </div>
                <div>
                    <textarea name='message' class='message' placeholder='Описание заметки'></textarea>
                </div>
                <a href='index.php'><button type='submit' name='comment_submit' class='btn_add_note'>Добавить</button></a>
                <br><br><br>
            </div>
        </form>";

        get_comments($connect);

        ?>
    </div>
    

</body>
</html>