<?php

$user = '#your database username';

$password = '#password';

$db = '#database_name';

$host = '#host_address';

$port = #port_number;

$conn = mysqli_connect($host, $user, $password, $db,$port) ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
