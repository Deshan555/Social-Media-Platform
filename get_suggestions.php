<?php 

include("config.php");

$user_id = $_SESSION['id'];

$sql_query = "SELECT Other_user_id FROM fallowing WHERE User_Id = $user_id;";

$stmt =  $conn->prepare($sql_query);

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

$sql_query_two = "SELECT * FROM Users WHERE User_Id NOT IN($fallowing_id) ORDER BY RAND() LIMIT 4;";

$stmt = $conn->prepare($sql_query_two);

$stmt->execute();

$suggestions = $stmt->get_result();

?>