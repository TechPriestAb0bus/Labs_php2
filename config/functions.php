<?php
require_once "connect.php";
global $connect;
function set_comment($connect) {
    require_once "connect.php";
    if(isset($_POST['comment_submit'])) {
        $title = $_POST['title'];
        $message = $_POST['message'];

        mysqli_query($connect, "INSERT INTO `comments` (`id`, `title`, `message`, `date`, `likes`) VALUES (NULL, '$title', '$message', NOW(), NULL)");

        unset($_POST['title']);
        unset($_POST['message']);
    }
}

function get_comments($connect) {
    $result = mysqli_query($connect, "SELECT * FROM comments ORDER BY date DESC LIMIT 100");
    while ($block = mysqli_fetch_assoc($result)) {
        echo "<div class='comment'>
            <br>
            <div class='name'>Anonimus</div>
            От ".$block['date']."<hr>
            <div class='title'>".$block['title']."<br></div><br>
            ".$block['message']."
            <div><br><form method='post' action='".add_like($block)."'><button type='submit' name='".$block['id']. "' class='like'><img class='img' src='../images/like.png'> " .$block['likes']."</button></form></div>
            </div>
        <br>";
    }
}

function add_like($block) {
    require("connect.php");
    global $connect;
    if (isset($_POST[$block['id']])) {
        $id = $block['id'];
        $likes = $block['likes'] + 1;

        mysqli_query($connect, "UPDATE comments SET likes = '$likes' WHERE id = '$id'");
        
        header('Location: ../index.php');
        exit;
    }
}

?>
