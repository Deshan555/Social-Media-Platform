<?php

include 'init.php';

session_regenerate_id(true);

session_destroy();
// Redirect to the login page:
header('Location: index.html');
?>