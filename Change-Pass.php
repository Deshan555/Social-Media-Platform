<?php

session_start();

include("config.php");

if (isset($_POST['change-password']))
{
    $user_id = $_SESSION['id'];

    $current_password = get_CurrentPassword($user_id);

    $data_By_User = $_POST['old-password'];

    $new_password = $_POST['new-password'];

    $retype_password = $_POST['retype-password'];

    $function_output = strcmp($current_password, md5($data_By_User));

    $function_output_2 = strcmp($new_password, $retype_password);

    $function_output_3 = strcmp($current_password, md5($new_password));

    if($function_output == 0)
    {
        if($function_output_3 == 0)
        {
            header('location: edit-profile.php?error_message=You Can"t Use Old Password as your new password');

            exit();
        }
        else
        {
            if($function_output_2 == 0)
            {
                Update_Password($new_password, $user_id);
            }
            else
            {
                header('location: edit-profile.php?error_message=Retype Correctly New Password');

                exit();
            }
        }
    }
    else
    {
        header('location: edit-profile.php?error_message=Old Password You Entered Incorrect');

        exit();
    }

}

function Update_Password($new_password, $user_id)
{
    include 'config.php';

    $secure_password = md5($new_password);

    $SQL = "UPDATE users SET PASSWORD_S = '$secure_password' WHERE User_ID = $user_id;";

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute()) {

        header('location: edit-profile.php?success_message=Password Change Successfully');

        exit;

    } else {

        header('location: edit-profile.php?error_message=Problem With Password Change Process');

        exit();
    }

    $conn->close();
}

function get_CurrentPassword($User_ID)
{
    include 'config.php';

    $SQL = "SELECT * FROM users WHERE User_ID = $User_ID;";

    $result = $conn->query($SQL);

    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $password = $row["PASSWORD_S"];

            return $password;
        }
    }else
    {
        return 0;
    }

    $conn->close();
}