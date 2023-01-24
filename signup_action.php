
<?php

session_start();

include('config.php');

if(isset($_POST['signup_btn']))
{
    $full_name = $_POST['full_name'];

    $user_name= $_POST['user_name'];

    $user_type = "1";

    $email_address= $_POST['email'];

    $facebook = "www.facebook.com";

    $whatsapp = "www.webwhatsapp.com";

    $bio = "tell use more about you";

    $fallowers = 0;

    $fallowing = 0;

    $post_count = 0;

    $image = "assets/images/default.png";

    $password= $_POST['password'];

    $password_confirm= $_POST['retype_password'];

    //echo $full_name;

    if($password != $password_confirm)
    {
        $message_error = "error message";

        header('location: WelCome?error_message=Passwords can not verify');

        exit;
    }

    // check user availibility

    $sql_query = "SELECT User_ID FROM USERS WHERE USER_NAME = '$user_name' OR EMAIL = '$email_address';";

    //echo $sql_query;

    $stmt = $conn->prepare($sql_query);

    //$stmt->bind_param("ss",$user_name, $email_address);

    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0)
    {
        echo 'user name already exists';

        header('location: WelCome?error_message=user already exists');

        exit;

    }else{

        $encrypted_password = md5($password);

        $insert_query = "INSERT INTO users (FULL_NAME,USER_NAME,USER_TYPE,PASSWORD_S,EMAIL,IMAGE,FACEBOOK,WHATSAPP,BIO,FALLOWERS,FALLOWING,POSTS) VALUES
        
        ('$full_name', '$user_name', '$user_type', '$encrypted_password', '$email_address', '$image', '$facebook', '$whatsapp', '$bio', $fallowers, $fallowing, $post_count);";

        $stmt->prepare($insert_query);

        if($stmt->execute())
        {
            $data_select = "SELECT FULL_NAME,USER_NAME,USER_TYPE,EMAIL,IMAGE,FACEBOOK,WHATSAPP,BIO,FALLOWERS,FALLOWING,POSTS FROM users WHERE USER_NAME = '$user_name';";

            $stmt = $conn->prepare($data_select);

            $stmt->execute();

            $stmt->bind_result($full_name, $user_name, $user_type, $email_address, $image, $facebook, $whatsapp, $bio, $fallowers, $fallowing, $post_count);

            $stmt->fetch();

            //$_SESSION['id'] = $User_ID;

            $_SESSION['username'] = $user_name;

            $_SESSION['fullname'] = $full_name;

            $_SESSION['email'] = $email_address;

            $_SESSION['usertype'] = $user_type;

            $_SESSION['facebook'] = $facebook;

            $_SESSION['whatsapp'] = $whatsapp;

            $_SESSION['bio'] = $bio;

            $_SESSION['fallowers'] = $fallowers;

            $_SESSION['fallowing'] = $fallowing;

            $_SESSION['postcount'] = $post_count;

            $_SESSION['img_path'] = $image;

            header("location: home.php");

        }else{

            header("location: WelCome?error_message=error occurred");

            exit;
        }       
    }

}else
{
    header("location: WelCome?error_message=error occurred");

    exit;
}



?>