<?php

$user = 'mdrh3o2xpg3uy0yv';

$password = 'gcdbv8exn60vo8t8';

$db = 'dvh4ff24tskwf150';

$host = 'ro2padgkirvcf55m.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';

$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db,$port) ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
