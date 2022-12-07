<?php

include('config.php');

if( isset($_GET['page_no']) && $_GET['page_no'] != "")
{
    $page_no = $_GET['page_no'];
}
else
{
    $page_no = 1;
}

$user_id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT COUNT(*) as total_posts FROM posts WHERE User_ID = ?");

$stmt->bind_param("i",$user_id);

$stmt->execute();

$stmt->bind_result($total_posts);

$stmt->store_result();

$stmt->fetch();

$total_posts_per_page = 20;

$offset = ($page_no-1) * $total_posts_per_page;

$total_no_of_pages = ceil($total_posts/$total_posts_per_page);

$stmt = $conn->prepare("SELECT * FROM posts WHERE User_ID = ?  ORDER BY Post_ID DESC LIMIT $offset,$total_posts_per_page");

$stmt->bind_param("i",$user_id);

$stmt->execute();

$posts = $stmt->get_result();

?>