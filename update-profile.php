
<?php

session_start();

include('config.php');

if(isset($_POST['submit']))
{
    $ID = $_SESSION['id'];

    $full_name = $_POST['full_name'];

    $user_name= $_POST['user_name'];

    $email_address= $_POST['email'];

    $facebook = $_POST['fbook'];

    $whatsapp = $_POST['wapp'];

    $bio = $_POST['bio'];

    $image = $_FILES['image']['temp_name'];

    if($image != "")
    {
        $image_name = $user_name . ".jpg";
    }
    else{

        $image_name =  $_SESSION['img_path'];
    }

    $sql_query = "SELECT USER_NAME FROM USERS WHERE USER_NAME = '$user_name';";

    echo $sql_query;

    $stmt = $conn->prepare($sql_query);

    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0)
    {
        header('location: edit-profile.php?error_message=User Name Alrady Taken');

        exit;

    }else{

        $insert_query = "UPDATE users SET FULL_NAME = '$full_name', USER_NAME = '$user_name' ,EMAIL = '$email_address', IMAGE = '$image', FACEBOOK = '$facebook', WHATSAPP = '$whatsapp', BIO = '$bio' WHERE User_ID = $ID ;";

        $stmt->prepare($insert_query);

        if($stmt->execute())
        {
            if($image != "")
            {
                // store images in th folder
                
                move_uploaded_file($image, "assets/images/profiles/".$image_name);
            }
            // upldate section

            $_SESSION['id'] = $ID;

            $_SESSION['username'] = $user_name;

            $_SESSION['fullname'] = $full_name;

            $_SESSION['email'] = $email_address;

            $_SESSION['facebook'] = $facebook;

            $_SESSION['whatsapp'] = $whatsapp;

            $_SESSION['bio'] = $bio;

            $_SESSION['img_path'] = $image;

            header("location: profile.php?success_message=Profile Updated Sucessfully");

            exit;

        }else{

            header("location: edit-profile.php?error_message=error occured");

            exit;
        }      
    }

}else
{
    header("location: edit-profile.php?error_message=error occured, try again");

    exit;
}



?>