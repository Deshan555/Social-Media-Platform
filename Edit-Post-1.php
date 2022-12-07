<?php

session_start();

include('config.php');

if(isset($_POST['edit']))
{
    $post_id = $_POST['post_id'];

    $post_hash = $_POST['hash-tag'];

    $post_caption = $_POST['caption'];

    Update_Post($post_id, $post_caption, $post_hash);
}
else{
}

function Update_Post($post_id, $post_caption, $post_hash)
{
    include 'config.php';

    $SQL = "UPDATE posts SET Caption = '$post_caption', HashTags = '$post_hash' WHERE Post_ID = $post_id;";

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute()) {

        $send = "single-post.php?post_id=$post_id&success_message=Current Post Updated Successfully";

        header("location: $send");

        exit;

    } else {

        $send = "single-post.php?post_id=$post_id&error_message=Problem With Post Update";

        header("location: $send");

        exit;
    }
}

