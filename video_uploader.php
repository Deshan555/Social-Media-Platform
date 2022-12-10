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
    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];
  
    $file_extansion = pathinfo($filename, PATHINFO_EXTENSION);
  
    $random_number = rand(0, 10000000);
  
    $file_rename = 'Vid_'.date('Ymd').$random_number;
  
    $file_complete = $file_rename.'.'.$file_extansion;
  
    $folder = "./assets/videos/" . $file_complete;
  
    move_uploaded_file($tempname, $folder);
  
    echo $file_complete;

    $ID = $_SESSION['id'];

    $caption = $_POST['caption'];

    $hashtags= $_POST['hash-tags'];
     
    $likes = 0;

    $date = date("Y-m-d");

    $sql_query = "INSERT INTO videos (User_ID, Likes, Video_Path, Caption, HashTags, Date_Upload)VALUES($ID, $likes, '$file_complete','$caption', '$hashtags', '$date')";

    echo $sql_query;

    $stmt = $conn->prepare($sql_query);

    if($stmt->execute())
    {
        move_uploaded_file($tempname, $folder);

        header("location: video_upload.php?success_message=Post Successfully updated");

        exit;
    }
    else
    {
        header("location: video_upload.php?error_message=Error Occured, try again - ERROR #008");

        exit;
    }
}
else
{
    header("location: video_upload.php?error_message=Error Occured, try again2 - ERROR #009");

    exit;
}

?>