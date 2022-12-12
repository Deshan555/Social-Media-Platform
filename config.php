<?php

$user = 'r6h0dfofvz3dg6j1';

$password = 'wg9d7fuvswmwpzic';

$db = 'ckkmy15kvonrb0en';

$host = 'h1use0ulyws4lqr1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';

$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db,$port) ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>