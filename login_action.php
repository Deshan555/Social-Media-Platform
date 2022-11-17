<?php

session_start();

include('config.php');

if(isset($_POST['button']))
{
    $fisrt_parm = $_POST['email'];

    $password = md5($_POST['password']);

    $full_name = "fullname";

    $user_name= "username";

    $user_type = "1";

    $email_address= "example@gmail.com";

    $facebook = "www.facebook.com";

    $whatsapp = "www.webwhatsapp.com";

    $bio = "tell use more about you";

    $fallowers = 0;

    $fallowing = 0;

    $post_count = 0;

    $image = "assets/images/default.png";

    $user_id = 000000;

    $sql_query = "SELECT User_ID, FULL_NAME, USER_NAME, USER_TYPE, EMAIL, IMAGE, FACEBOOK, WHATSAPP, BIO, FALLOWERS, FALLOWING, POSTS  FROM USERS WHERE (USER_NAME = '$fisrt_parm' OR EMAIL = '$fisrt_parm') AND PASSWORD_S = '$password';";

    $stmt = $conn->prepare($sql_query);

    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0)
    {
        $stmt->bind_result($user_id, $full_name, $user_name, $user_type, $email_address, $image, $facebook, $whatsapp, $bio, $fallowers, $fallowing, $post_count);
        
        $stmt->fetch();

        $_SESSION['id'] = $user_id;

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
    }
    else{

        echo 'faild';

        header('location: login.php?error_message=Email/Password Incorrect');

        exit;
    }
}
else{

    echo 'fails';

    header('location: login.php?error_message=Some Error Happend');

    exit;
}

?>