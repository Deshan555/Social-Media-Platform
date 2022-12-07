<?php

session_start();

include('config.php');

$user_id = $_SESSION['id'];

$sql = "SELECT * FROM fallowing WHERE User_Id = $user_id;";

echo $sql;

$stmt = $conn->prepare($sql);

$stmt->execute();

$ids = array();

$result = $stmt->get_result();

while($row = $result->fetch_array(MYSQLI_NUM))
{
    foreach($row as $rows)
    {
        $ids[] = $rows;
    }
}

if(empty($ids))
{
    $ids = [$user_id];
}

$fallowing_id = join(",",$ids);

$sql_query_two = "SELECT * FROM Users WHERE User_Id IN($fallowing_id) ORDER BY RAND() LIMIT 15;";

echo $sql_query_two;

$stmt = $conn->prepare($sql_query_two);

$stmt->execute();

$Clubs = $stmt->get_result();

?>