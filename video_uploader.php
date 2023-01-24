<?php

require 'init.php';

session_regenerate_id(true);

$function_out = strcmp($_SESSION['usertype'], '1');

if(!isset($_SESSION['id']))
{
    header('location: login.php');

    exit;
}
else
{
    if($function_out == 0)
    {
        header("location: home.php");
    }
}

include('config.php');

if(isset($_POST['posting']))
{
    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $filename_thumb = $_FILES["thumbnail"]["name"];

    $thumb_temp_name = $_FILES["thumbnail"]["tmp_name"];

    $file_type = pathinfo($filename_thumb, PATHINFO_EXTENSION);
  
    $file_extansion = pathinfo($filename, PATHINFO_EXTENSION);
  
    $random_number = rand(0, 10000000);
  
    $file_rename = 'Vid_'.date('Ymd').$random_number;
  
    $file_complete = $file_rename.'.'.$file_extansion;

    $thumbnail_name = 'Thumb_'.date('Ymd').$random_number;

    $thumbnail_name_complete = $thumbnail_name.'.'.$file_type;
  
    $folder = "./assets/videos/" . $file_complete;

    $second_file = "./assets/videos/" . $thumbnail_name_complete;

    $ID = $_SESSION['id'];

    $caption = $_POST['caption'];

    $hashtags= $_POST['hash-tags'];
     
    $likes = 0;

    $date = date("Y-m-d");

    $sql_query = "INSERT INTO videos (User_ID, Likes, Video_Path, Caption, HashTags, Date_Upload, Thumbnail_Path)VALUES($ID, $likes, '$file_complete','$caption', '$hashtags', '$date', '$thumbnail_name_complete')";

    echo $sql_query;

    $stmt = $conn->prepare($sql_query);

    if($stmt->execute())
    {
        move_uploaded_file($tempname, $folder);

        move_uploaded_file($thumb_temp_name, $second_file);

        header("location: video_upload.php?success_message=Post Successfully updated");

        exit;
    }
    else
    {
        header("location: video_upload.php?error_message=Error Occurred, try again - ERROR #008");

        exit;
    }
}
else
{
    header("location: video_upload.php?error_message=Error Occurred, try again2 - ERROR #009");

    exit;
}

?>