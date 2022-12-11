<?php

session_start();

function find_Events()
{
    include "config.php";

    $search_input = $_SESSION['id'];

    $SQL = "SELECT * FROM events WHERE User_ID = $search_input;";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();

    $event = $stmt->get_result();

    return $event;
}

function find_Shorts()
{
    $search_input = $_SESSION['id'];

    include "config.php";

    $SQL = "SELECT * FROM videos WHERE User_ID = $search_input;";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();

    $shorts = $stmt->get_result();

    return $shorts;
}

function get_My_Followers()
{
    include "config.php";

    $my_id = $_SESSION['id'];

    $SQL = "SELECT * FROM fallowing WHERE Other_user_id = $my_id;";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();

    $users = $stmt->get_result();

    return $users;
}

function get_My_Followings()
{
    include "config.php";

    $my_id = $_SESSION['id'];

    $SQL = "SELECT * FROM fallowing WHERE User_Id = $my_id;";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();

    $users = $stmt->get_result();

    return $users;
}






