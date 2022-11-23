<?php

//session_start();

include('config.php');

$ID = $_SESSION['id'];

$sql = "SELECT * FROM Posts WHERE User_ID = $ID ;";

//echo $sql;

$stmt = $conn->prepare($sql);

if($stmt->execute())
{
    $posts = $stmt->get_result();
}
else
{
    // don't need to anything

    $posts = [];
}

?>