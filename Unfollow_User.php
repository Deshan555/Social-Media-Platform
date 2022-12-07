<?php

session_start();

include("config.php");

if (isset($_POST['unfollow']))
{
    $user_id = $_SESSION['id'];

    $unfollow_person = $_POST['other_User_Id'];

    $get_Id = "SELECT * FROM fallowing WHERE User_Id = $user_id AND Other_user_id = $unfollow_person;";

    $data = mysqli_query($conn, $get_Id);

    while($row = mysqli_fetch_assoc($data))
    {
        $target_id = $row['ID'];
    }

    $sql = "DELETE FROM fallowing WHERE ID = $target_id;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $conn->close();

    update_Fallowers($unfollow_person);

    update_Fallowing($user_id);

    $_SESSION['fallowing'] =   $_SESSION['fallowing']-1;

    header("location: home.php");

}
else{

    header("location: home.php");
}


function update_Fallowing($user_id)
{
    include("config.php");

    $sql = "UPDATE users SET FALLOWING = FALLOWING-1 WHERE User_ID = $user_id ;";

    $stmt = $conn -> prepare($sql);

    $stmt->execute();
}

function update_Fallowers($other_Person)
{
    include("config.php");

    $sql = "UPDATE users SET FALLOWERS = FALLOWERS-1 WHERE User_ID = $other_Person;";

    $stmt = $conn -> prepare($sql);

    $stmt->execute();
}

?>