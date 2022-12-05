<?php


session_start();

include("config.php");

if (isset($_POST['fallow'])) {

    $user_id = $_SESSION['id'];

    $falloing_person = $_POST['fallow_person'];

    $sql = "INSERT INTO fallowing(User_ID, Other_user_id) VALUES ($user_id, $falloing_person);";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $conn->close();

    update_Fallowers($falloing_person);

    update_Fallowing($user_id);

    $_SESSION['fallowing'] =   $_SESSION['fallowing']+1;

    header("location: home.php");

}
else{

    header("location: home.php");
}


function update_Fallowing($user_id)
{
    include("config.php");

    $sql = "UPDATE users SET FALLOWING = FALLOWING+1 WHERE User_ID = $user_id ;";
   
    $stmt = $conn -> prepare($sql);

    $stmt->execute();
}

function update_Fallowers($other_Person)
{
    include("config.php");

    $sql = "UPDATE users SET FALLOWERS = FALLOWERS+1 WHERE User_ID = $other_Person;";

    $stmt = $conn -> prepare($sql);

    $stmt->execute();
}

?>