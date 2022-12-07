<?php

session_start();

function Update_Profile($ID, $full_name, $user_name, $email_address, $facebook, $whatsapp, $bio)
{
    include 'config.php';

    $insert_query = "UPDATE users SET FULL_NAME = '$full_name', USER_NAME = '$user_name' ,EMAIL = '$email_address', FACEBOOK = '$facebook', WHATSAPP = '$whatsapp', BIO = '$bio' WHERE User_ID = $ID ;";

    $stmt = $conn->prepare($insert_query);

    if ($stmt->execute()) {
        $_SESSION['id'] = $ID;

        $_SESSION['username'] = $user_name;

        $_SESSION['fullname'] = $full_name;

        $_SESSION['email'] = $email_address;

        $_SESSION['facebook'] = $facebook;

        $_SESSION['whatsapp'] = $whatsapp;

        $_SESSION['bio'] = $bio;

        header("location: my_Profile.php?success_message=Profile Updated Successfully");

        exit;

    } else {

        header("location: edit-profile.php?error_message=error Occurred");

        exit;
    }
}

?>