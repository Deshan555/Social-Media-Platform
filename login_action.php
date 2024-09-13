<?php
session_start();

include('config.php');

if (isset($_POST['button'])) {

    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        header('location: login.php?error_message=Invalid CSRF token');
        exit;
    }

    // Input sanitization
    $fisrt_parm = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']); // Insecure hashing algorithm

    $sql_query = "SELECT User_ID, FULL_NAME, USER_NAME, USER_TYPE, EMAIL, IMAGE, FACEBOOK, WHATSAPP, BIO, FALLOWERS, FALLOWING, POSTS  
                  FROM USERS 
                  WHERE (USER_NAME = ? OR EMAIL = ?) AND PASSWORD_S = ?";

    $stmt = $conn->prepare($sql_query);
    $stmt->bind_param("sss", $fisrt_parm, $fisrt_parm, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows() > 0) {
        $stmt->bind_result($user_id, $full_name, $user_name, $user_type, $email_address, $image, $facebook, $whatsapp, $bio, $fallowers, $fallowing, $post_count);
        $stmt->fetch();

        // Set session variables
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
    } else {
        header('location: login.php?error_message=Email/Password Incorrect');
        exit;
    }
} else {
    header('location: login.php?error_message=Some Error Happened');
    exit;
}
