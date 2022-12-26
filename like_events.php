<?php

session_start();

include("config.php");

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';

$user_id = $_SESSION['id'];

$SQL = "INSERT INTO likes_events(Event_ID, User_ID)VALUES($post_id, $user_id);";

$stmt = $conn->prepare($SQL);

$stmt->execute();

$conn->close();

update_likes($post_id);


function update_likes($post_id)
{
    include("config.php");

    $sql = "UPDATE events SET Likes = Likes+1 WHERE Event_ID = $post_id;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}

