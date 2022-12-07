<?php

include('config.php');

$ID = $target_id;

$sql = "SELECT * FROM Posts WHERE User_ID = $ID ;";

//echo $sql;

$stmt = $conn->prepare($sql);

if($stmt->execute())
{
    $posts = $stmt->get_result();
}
else
{
    $posts = [];
}

?>