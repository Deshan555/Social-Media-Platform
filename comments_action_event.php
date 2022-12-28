<?php

session_start();

include("config.php");

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';

$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

$user_id = $_SESSION['id'];

$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO comments_events(EVENT_ID, USER_ID, COMMENT, DATE)VALUES ($post_id, $user_id, '$comment', '$date');";

echo ($sql);

$stmt = $conn->prepare($sql);

if($stmt->execute())
{
    // if your comment submit successfully js function do actions for it
}
else
{
    header("location: Single-Event.php?post_id=" . $post_id."&error_message=Your Opinion Submission Abort");
}

exit;

?>