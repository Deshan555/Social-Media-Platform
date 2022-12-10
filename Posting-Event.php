<?php

session_start();

if(!isset($_SESSION['id']))
{
    header('location: login.php');

    exit;
}

include('config.php');

if(isset($_POST['posting']))
{
    $filename = $_FILES['image']['name'];

    $tempname = $_FILES["image"]["tmp_name"];

    $file_extansion = pathinfo($filename, PATHINFO_EXTENSION);

    $random_number = rand(0, 10000000);

    $file_rename = 'File_'.date('Ymd').$random_number;

    $file_complete = $file_rename.'.'.$file_extansion;

    $ID = $_SESSION['id'];

    $caption = $_POST['caption'];

    $hashtags= $_POST['hash-tags'];

    $invite_link = $_POST['event-link'];

    $event_date = $_POST['event-date'];

    $event_time = $_POST['event-time'];

    $folder = "./assets/images/posts/" . $file_complete;

    $likes = 0;

    $date = date("Y-m-d H:i:s");

    $sql_query = "INSERT INTO events (User_ID, Likes, Event_Poster, Caption, Event_Time, Event_Date, Invite_Link, HashTags, Date_Upload) VALUES 
    ($ID, $likes, '$file_complete','$caption', '$event_time','$event_date','$invite_link','$hashtags','$date')";

    $stmt = $conn->prepare($sql_query);

    if($stmt->execute())
    {
        move_uploaded_file($tempname, $folder);

        header("location: Events.php?success_message=Post Successfully updated");

        exit;
    }
    else
    {
        header("location: Event-Upload.php?error_message=Error Occurred, DB Error");

        exit;
    }
}
else
{
    header("location: post-uploader.php?error_message=Error Occurred, try again2 - ERROR #009");

    exit;
}


function update_Posts($user_id)
{
    include 'config.php';

    $insert_query = "UPDATE users SET POSTS = POSTS+1 WHERE User_ID = $user_id ;";

    $stmt = $conn->prepare($insert_query);

    if ($stmt->execute()) {

        $_SESSION['postcount'] = $_SESSION['postcount']+1;
    }
}
?>