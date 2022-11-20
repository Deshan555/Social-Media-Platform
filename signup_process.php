
<?php

session_start();

include('config.php');

if(isset($_POST['signup_btn']))
{
    $email_address= $_POST['email'];

    $full_name = full_name($email_address);

    $user_name= userName();

    $user_type = "1";

    $facebook = "www.facebook.com";

    $whatsapp = "www.webwhatsapp.com";

    $bio = "tell use more about you";

    $fallowers = 0;

    $fallowing = 0;

    $post_count = 0;

    $image = "assets/images/default.png";

    $password= randomPassword();

    $domain_validation = 0;

    $domain_validation = domain_validator($email_address);

    // domain validation

    if(!$domain_validation == 0)
    {
        // user availibility check in the system
        
        $sql_query = "SELECT User_ID FROM USERS WHERE EMAIL = '$email_address';";
    
        $stmt = $conn->prepare($sql_query);
    
        $stmt->execute();
    
        $stmt->store_result();

        if($stmt->num_rows() > 0)
        {    
            header('location: create-account.php?error_message=Your Email  Account alrady register on System');
    
            exit;
        }
        else
        {
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

            header("location: create-account.php?error_message=error occured #008");

            exit;
        }       
      }
    }
    else
    {
        header("location: create-account.php?error_message=This system does not support external email addresses. Please use the SLTC Mail address that was provided to you");

        exit;
    }
}else
{
    header("location: create-account.php?error_message=error occured #009");

    exit;
}

function userName()
{
    return rand();
}

function full_name($email)
{   
    $username = strstr($email, '@', true);
    
    return $username;
}

function randomPassword() 
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    $pass = array();

    $alphaLength = strlen($alphabet) - 1; 

    for ($i = 0; $i < 8; $i++) 
    {
        $n = rand(0, $alphaLength);
    
        $pass[] = $alphabet[$n];
    }

    return implode($pass);
}

function domain_validator($email)
{    
    $acceptedDomains = array('sltc.ac.lk', 'sltc.lk');
    
    if(in_array(substr($email, strrpos($email, '@') + 1), $acceptedDomains))
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

?>
