<?php

session_start();

include('config.php');

if(isset($_POST['drop']))
{
    $post_id = $_POST['post_id'];

    Drop_Post($post_id);
}
else
{
    $send = "Single-Event.php?post_id=$post_id&error_message=Unrecognized Request";

    header("location: $send");

    exit;
}

function Drop_Post($post_id)
{
    include 'config.php';

    $SQL = "DELETE FROM events WHERE Event_ID = $post_id";

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute())
    {
        Drop_Likes($post_id);

        Drop_Comments($post_id);

        header("location: Events.php");

        exit;

    } else {

        $send = "Single-Event.php?post_id=$post_id&error_message=Problem With Drop Your Post";

        header("location: $send");

        exit;
    }
}

function Drop_Likes($post_id): void
{
    include 'config.php';

    $SQL = "DELETE FROM likes_events WHERE Event_ID = $post_id";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();
}

function Drop_Comments($post_id): void
{
    include 'config.php';

    $SQL = "DELETE FROM comments_events WHERE Event_ID = $post_id";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();
}

