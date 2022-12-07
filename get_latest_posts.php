<?php

include('config.php');


if(isset($_GET['page_no']) && $_GET['page_no'] != "")
{
    $page_no = $_GET['page_no'];
}else
{
    $page_no = 1;
}

$sql = "SELECT COUNT(*) as total_posts FROM Posts";

$stmt = $conn->prepare($sql);

$stmt->execute();

$stmt->bind_result($total_posts);

$stmt->store_result();

$stmt->fetch();

$total_posts_per_page = 10;

$offest = ($page_no - 1) * $total_posts_per_page;

// that php ceil function return rounded numbers

$total_number_pages = ceil($total_posts/$total_posts_per_page);

$stmt = $conn->prepare("SELECT * FROM Posts ORDER BY Post_ID DESC LIMIT $offest, $total_posts_per_page;");

$stmt->execute();

$posts = $stmt->get_result();


?>