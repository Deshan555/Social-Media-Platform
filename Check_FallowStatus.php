<?php

session_start();

include('config.php');

$user_id = $_SESSION['id'];

$sql = "SELECT * FROM fallowing WHERE User_Id = $user_id AND Other_user_id = $target_id;";

$stmt = $conn->prepare($sql);

$stmt->execute();

$stmt->store_result();

if($stmt->num_rows() > 0)
{
    $following_status = true;
}
else{
    $following_status = false;
}

?>