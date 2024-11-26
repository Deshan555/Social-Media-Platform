<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "security");
$query = "SELECT * FROM tbl_post ORDER BY post_id DESC";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  echo '<p>'.$row["post_name"].'</p>';
 }
}
?>