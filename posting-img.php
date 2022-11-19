<?php

session_start();

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

    $user_name= $_SESSION['username'];

    $user_profile = $_SESSION['img_path'];

    $caption = $_POST['caption'];

    $hashtags= $_POST['hash-tags'];
     
    $folder = "./assets/images/posts/" . $file_complete;

    $likes = 0;

    $date = date("Y-m-d H:i:s");

    $sql_query = "INSERT INTO Posts (User_ID, Likes, Img_Path, Caption, HashTags, USER_NAME, Profile_Img, Date_Upload) VALUES 
    ($ID, $likes, '$file_complete','$caption', '$hashtags', '$user_name', '$user_profile', '$date')";

    echo $sql_query;

    $stmt = $conn->prepare($sql_query);

    if($stmt->execute())
    {
        move_uploaded_file($tempname, $folder);

        header("location: post-uploader.php?success_message?Post Successfully updated");

        echo "done";
    }
    else
    {
        header("location: post-uploader.php?error_message?Error Occured, try again");

        exit;
    }
}
else
{
    header("location: post-uploader.php?error_message?Error Occured, try again");

    exit;
}























?>