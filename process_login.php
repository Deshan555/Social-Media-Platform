<?php

$conn = include('config.php');

if(isset($_POST['button']))
{
    //include('config.php');

    $email = $_POST['email'];

    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT User_ID, FULL_NAME, USER_TYPE, EMAIL, IMAGE, FACEBOOK, WHATSAPP, BIO, FALLOWERS, FALLOWING, POSTS  FROM USERS WHERE USER_NAME = ? AND PASSWORD = ?");

    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0)
    {
        echo 'done';
    }
    else{

        echo 'undo';
    }
}
else{

    echo 'error';
}

?>