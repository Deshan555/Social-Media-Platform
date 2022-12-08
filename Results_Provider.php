<?php

function find_Users($search_input)
{
    include "config.php";

    $SQL = "SELECT * FROM users WHERE FULL_NAME LIKE '%$search_input%' OR USER_NAME LIKE '%$search_input%';";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();

    $users = $stmt->get_result();

    return $users;
}





