<?php

session_start();

include("config.php");

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';

$user_id = $_SESSION['id'];

$get_Id = "SELECT * FROM likes_vid WHERE User_ID = $user_id AND Video_ID = $post_id;";

$data = mysqli_query($conn, $get_Id);

while($row = mysqli_fetch_assoc($data))
{
    $Like_ID = $row['Like_ID'];
}

$SQL = "DELETE FROM likes_vid WHERE Like_ID = $Like_ID;";

$stmt = $conn->prepare($SQL);

$stmt->execute();

$conn->close();

update_likes($post_id);


function update_likes($post_id)
{
    include("config.php");

    $sql = "UPDATE videos SET Likes = Likes-1 WHERE Video_ID = $post_id;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}

?>
