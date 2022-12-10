<?php

session_start();

include('config.php');

if (isset($_POST['edit-comment'])) {

    $post_id =  $_POST['post_id'];

    $comment_id = $_POST['comment_id'];

    $comment = $_POST['comment'];

    Update_Comment($post_id, $comment, $comment_id);
} else {
}

function Update_Comment($post_id, $post_comment, $comment_id)
{
    include 'config.php';

    $SQL = "UPDATE comments_vid SET COMMENT = '$post_comment' WHERE COMMENT_ID = $comment_id;";

    echo $SQL;

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute()) {

        $send = "Single-Video.php?post_id=$post_id&success_message=Current Opinion Updated Successfully";

        header("location: $send");

        exit;

    } else {

        $send = "Single-Video.php?post_id=$post_id&error_message=Problem With Update Opinion";

        header("location: $send");

        exit;
    }
}

