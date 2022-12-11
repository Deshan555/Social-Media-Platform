<?php

session_start();

function mydata()
{
    include "config.php";

    $my_id = $_SESSION['id'];

    $SQL = "SELECT * FROM fallowing WHERE User_Id = $my_id;";

    $result = mysqli_query($conn, $SQL);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["User_Id"] . " - Name: " . $row["Other_user_id"] . " " . $row["ID"] . "<br>";

            return $row;
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
}


function writeMsg()
{
    echo "Hello world!";
}

$data = mydata();

$data[0];

writeMsg();
?>