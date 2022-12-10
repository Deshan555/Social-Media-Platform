<?php

session_start();

include('config.php');

if(isset($_POST['edit']))
{
    $post_id = $_POST['post_id'];

    $post_hash = $_POST['hash-tag'];

    $post_caption = $_POST['caption'];

    $invite_link = $_POST['invite-link'];

    $event_date = $_POST['event-date'];

    $event_time = $_POST['time'];

    Update_Post($post_id, $post_caption, $post_hash, $invite_link, $event_date, $event_time);
}
else{
}

function Update_Post($post_id, $post_caption, $post_hash, $invite_link, $event_date, $event_time)
{
    include 'config.php';

    $SQL = "UPDATE events SET Caption = '$post_caption', HashTags = '$post_hash', Event_Time = '$event_time', Invite_Link = '$invite_link', Event_Date = '$event_date' WHERE Event_ID = $post_id;";

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute()) {

        $send = "Single-Event.php?post_id=$post_id&success_message=Current Post Updated Successfully";

        header("location: $send");

        exit;

    } else {

        $send = "Single-Event.php?post_id=$post_id&error_message=Problem With Post Update";

        header("location: $send");

        exit;
    }
}

