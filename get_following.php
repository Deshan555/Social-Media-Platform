<?php

include('config.php');

$user_id = $_SESSION['id'];

$sql = "SELECT * FROM fallowing WHERE User_Id = $user_id;";

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
    $ids[] = $user_id;
}
    $fallowing_id = join(",",$ids);

    $sql_query_two = "SELECT * FROM Users WHERE User_Id IN($fallowing_id) AND USER_TYPE = '1'ORDER BY RAND() LIMIT 15;";

    $stmt = $conn->prepare($sql_query_two);

    $stmt->execute();

    $Clubs = $stmt->get_result();


?>