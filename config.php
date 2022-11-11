<?

$user = 'root';

$password = 'root';

$db = 'EventsWave';

$host = 'localhost';

$port = 3306;

$link = mysqli_init();

$success = mysqli_real_connect($link, $host, $user, $password, $db,$port)or die("couldn't connect to the database");

?>