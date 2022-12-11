<?php

session_start();

include("config.php");

if (isset($_POST['reaction'])) {

    $user_id = $_SESSION['id'];

    $post_id = $_POST['post_id'];

    $SQL = "INSERT INTO likes(Post_ID, User_ID)VALUES($post_id, $user_id);";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();

    $conn->close();

    update_likes($post_id);

    header("location: home.php");

} else {

    header("location: home.php");
}


function update_likes($post_id)
{
    include("config.php");

    $sql = "UPDATE posts SET Likes = Likes+1 WHERE Post_ID = $post_id;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}

?>