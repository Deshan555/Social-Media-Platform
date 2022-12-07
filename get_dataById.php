<?php 

function get_UserData($user_id)
{
    include('config.php');
        
    $sql = "SELECT * FROM users WHERE USER_ID = $user_id";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {

            $User_Name = $row["USER_NAME"];

            $Full_Name = $row["FULL_NAME"];

            $Profile_Picture = $row["IMAGE"];

            $data_array = array($User_Name, $Full_Name, $Profile_Picture);

            return $data_array;
        }
    }else 
    {
        return 0;
    }
    
    $conn->close();
    
}
?>