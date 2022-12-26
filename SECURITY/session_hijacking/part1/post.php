<?php
//insert.php
if(isset($_POST["post_name"]))
{
 $connect = mysqli_connect("localhost", "root", "", "auto_refresh");
 $post_name = mysqli_real_escape_string($connect, $_POST["post_name"]);
 $sql = "INSERT INTO tbl_post (post_name) VALUES ('".$post_name."')";
 mysqli_query($connect, $sql);
}

?>