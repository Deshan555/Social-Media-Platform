<!DOCTYPE html>

<html lang="en">

<?php

require '../config.php';

//variables--------------------------------------------------------------------------------------------------------
$todayIs = date("Y-m-d");
$numberofEventsToday=0;         $todayEvent_1=array("","","","","","");
                                $todayEvent_2=array("","","","","","");
                                $todayEvent_3=array("","","","","","");
                                $todayEvent_4=array("","","","","","");

$numberofEventsNextday=0;       $nextdayEvent_1=array("","","","","","");
                                $nextdayEvent_2=array("","","","","","");
                                $nextdayEvent_3=array("","","","","","");
                                $nextdayEvent_4=array("","","","","","");

$numberofSpecialEvents=0;       $specialEvent_1=array("","","","","","");
                                $specialEvent_2=array("","","","","","");
                                $specialEvent_3=array("","","","","","");
                                $specialEvent_4=array("","","","","","");

                        
// selecting events for today---------------------------------------------------------------------------------------

$sql = "SELECT * FROM events WHERE DATE(Event_Date) = '$todayIs'";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $numberofEventsToday=$numberofEventsToday+1;

        if($numberofEventsToday==1)
        {
            $todayEvent_1[0] = $row["Event_ID"];
            $todayEvent_1[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            $todayEvent_1[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]);
            $todayEvent_1[3] = $row["Event_Date"];
            $todayEvent_1[4] = $row["Event_Time"];
            $todayEvent_1[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
            
        }

        if($numberofEventsToday==2)
        {
            $todayEvent_2[0] = $row["Event_ID"];
            $todayEvent_2[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            $todayEvent_2[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]) ;
            $todayEvent_2[3] = $row["Event_Date"];
            $todayEvent_2[4] = $row["Event_Time"];
            $todayEvent_2[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
            
        }

        if($numberofEventsToday==3)
        {
            $todayEvent_3[0] = $row["Event_ID"];
            $todayEvent_3[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            $todayEvent_3[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]);
            $todayEvent_3[3] = $row["Event_Date"];
            $todayEvent_3[4] = $row["Event_Time"];
            $todayEvent_3[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
            
        }

        if($numberofEventsToday==4)
        {
            $todayEvent_4[0] = $row["Event_ID"];
            $todayEvent_4[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            $todayEvent_4[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]);
            $todayEvent_4[3] = $row["Event_Date"];
            $todayEvent_4[4] = $row["Event_Time"];
            $todayEvent_4[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
        }     
    }
}


//selecting events for nextday --------------------------------------------------------------------------------------

$nextday=date("Y-m-d", strtotime('+1 day'));
$nextYear=date("Y-m-d", strtotime('+1 year'));


$sql = "SELECT * FROM events WHERE Event_Date BETWEEN '$nextday' AND '$nextYear'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $numberofEventsNextday=$numberofEventsNextday+1;

        if($numberofEventsNextday==1)
        {
            $nextdayEvent_1[0] = $row["Event_ID"];            
            $nextdayEvent_1[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            //$nextdayEvent_1[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]);
            $nextdayEvent_1[3] = $row["Event_Date"];
            $nextdayEvent_1[4] = $row["Event_Time"];
            $nextdayEvent_1[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
            
        }

        if($numberofEventsNextday==2)
        {
            $nextdayEvent_2[0] = $row["Event_ID"];            
            $nextdayEvent_2[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            //$nextdayEvent_2[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]) ;
            $nextdayEvent_2[3] = $row["Event_Date"];
            $nextdayEvent_2[4] = $row["Event_Time"];
            $nextdayEvent_2[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
            
        }

        if($numberofEventsNextday==3)
        {
            $nextdayEvent_3[0] = $row["Event_ID"];            
            $nextdayEvent_3[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            //$nextdayEvent_3[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]);
            $nextdayEvent_3[3] = $row["Event_Date"];
            $nextdayEvent_3[4] = $row["Event_Time"];
            $nextdayEvent_3[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
            
        }

        if($numberofEventsNextday==4)
        {
            $nextdayEvent_4[0] = $row["Event_ID"];            
            $nextdayEvent_4[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
            //$nextdayEvent_4[2] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Event_Poster"]);
            $nextdayEvent_4[3] = $row["Event_Date"];
            $nextdayEvent_4[4] = $row["Event_Time"];
            $nextdayEvent_4[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
        }     
    }
    
}

// selecting special events--------------------------------------------------------------------------------------

$sql = "SELECT * FROM special_events WHERE Event_Date BETWEEN '$todayIs' AND '$nextYear'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $numberofSpecialEvents=$numberofSpecialEvents+1;

        if($numberofSpecialEvents==1)
        {
            $specialEvent_1[0] = $row["Event_ID"];
            $specialEvent_1[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
          //$specialEvent_1[2] = No event poster
            $specialEvent_1[3] = $row["Event_Date"];
            $specialEvent_1[4] = $row["Event_Time"];
            $specialEvent_1[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
        }

        if($numberofSpecialEvents==2)
        {
            $specialEvent_2[0] = $row["Event_ID"];
            $specialEvent_2[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
          //$specialEvent_2[2] = No event poster
            $specialEvent_2[3] = $row["Event_Date"];
            $specialEvent_2[4] = $row["Event_Time"];
            $specialEvent_2[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);

        }

        if($numberofSpecialEvents==3)
        {
            $specialEvent_3[0] = $row["Event_ID"];
            $specialEvent_3[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
          //$specialEvent_3[2] = No event poster
            $specialEvent_3[3] = $row["Event_Date"];
            $specialEvent_3[4] = $row["Event_Time"];
            $specialEvent_3[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
        }

        if($numberofSpecialEvents==4)
        {
            $specialEvent_4[0] = $row["Event_ID"];
            $specialEvent_4[1] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Caption"]);
          //$specialEvent_4[2] = No event poster
            $specialEvent_4[3] = $row["Event_Date"];
            $specialEvent_4[4] = $row["Event_Time"];
            $specialEvent_4[5] = str_replace( array( "\n", "\r" ), array( " ", " " ),$row["Invite_Link"]);
        }
    }
}


//echo $numberofEventsToday;     //show number of events today
//echo $numberofEventsNextday;     //show number of events nextday

// php end---------------------------------------------------------------------------------------------------------
?> 


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Events Calendar</title>

    <style>
        [class="eventCalendar"] 
        {
            margin-top: 20px; margin-left: 10px;
        }

        [class="homeIcon"] 
        {
            text-align: right; margin-top: 20px; margin-right: 30px;
        }

        [class="col-md"] 
        {
            margin-top: 10px; margin-right: 10px; margin-left: 10px;
            border-radius: 20px;
            padding: 1rem;

            background-color: #F5F5F5;
            border: 2px solid #F5F5F5;
            color: rgb(0, 0, 0);
        }

        [class="eventBox"] 
        {
            margin-top: 10px; margin-right: 10px;
            border-radius: 15px;
            padding: 2rem;

            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
        }

        [class="specialEventsImage"]
        {
            border-radius: 15px;
        }



        [class="dates"] 
        {
            color: rgb(0, 130, 255);
        }

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,500&display=swap');

        *{
            font-family: 'Open Sans', sans-serif;
        }

        body{
            font-family: 'Open Sans', sans-serif;
        }
        .button 
        {
            background-image: linear-gradient(to right, #0082FF 0%, #0082FF 51%,   #00bdff   100%);
            border: none;
            color: white;
            padding: 10px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 40px;
        }

        #todayEventBox_1-1{font-weight:bold;}
        #todayEventBox_2-1{font-weight:bold;}
        #todayEventBox_3-1{font-weight:bold;}
        #todayEventBox_4-1{font-weight:bold;}
        
        #nextdayEventBox_1-1{font-weight:bold;}
        #nextdayEventBox_2-1{font-weight:bold;}
        #nextdayEventBox_3-1{font-weight:bold;}
        #nextdayEventBox_4-1{font-weight:bold;}

        #specialEventBox_1-1{font-weight:bold;}
        #specialEventBox_2-1{font-weight:bold;}
        #specialEventBox_3-1{font-weight:bold;}
        #specialEventBox_4-1{font-weight:bold;}


    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="eventCalendar">
                    <a href="../home.php">
                        <img src="../assets/images/black_logo.png" width="20%" id="logo-img" style="cursor: pointer; height: 50%; margin-top: 10px; margin-left: 30px">
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="homeIcon">

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="today">
                    <h6 style="display:inline; text-transform: uppercase">Today </h6>
                    <h6 style="display:inline;" id="dateToday" class="dates"></h6>
                    <div class="container-fluid">
                        <div class="row" class="rounded" id="todayEvent_1">
                                <div class="eventBox" id="todayEventBox_1">
                                    <div id="todayEventBox_1-1" class="todayEventBox_1-1"></div>
                                    <div id="todayEventBox_1-2"></div>
                                    <br>
                                    <div id="todayEventBox_1-3"></div>
                                    <div id="todayEventBox_1-4"></div>
                                    
                                    <a href='<?= $todayEvent_1[5] ?>'>
                                        <button type="button" class="button" id="todayEventBox_1-5" >Invitation Link</button>
                                    </a>

                                </div>
                        </div>
                        <div class="row" id="todayEvent_2">
                            <div class="eventBox" id="todayEventBox_2">
                                    <div id="todayEventBox_2-1"></div>
                                    <div id="todayEventBox_2-2"></div>
                                    <br>
                                    <div id="todayEventBox_2-3"></div>
                                    <div id="todayEventBox_2-4"></div>

                                    <a href='<?= $todayEvent_2[5] ?>'>
                                        <button type="button" class="button" id="todayEventBox_2-5" >Invitation Link</button>
                                    </a>
                            </div>
                        </div>
                        <div class="row" id="todayEvent_3">
                            <div class="eventBox" id="todayEventBox_3">
                                    <div id="todayEventBox_3-1"></div>
                                    <div id="todayEventBox_3-2"></div>
                                    <br>
                                    <div id="todayEventBox_3-3"></div>
                                    <div id="todayEventBox_3-4"></div>

                                    <a href='<?= $todayEvent_3[5] ?>'>
                                        <button type="button" class="button" id="todayEventBox_3-5" >Invitation Link</button>
                                    </a>
                            </div>
                        </div>
                        <div class="row" id="todayEvent_4">
                            <div class="eventBox" id="todayEventBox_4">
                                    <div id="todayEventBox_4-1"></div>
                                    <div id="todayEventBox_4-2"></div>
                                    <br>
                                    <div id="todayEventBox_4-3"></div>
                                    <div id="todayEventBox_4-4"></div>

                                    <a href='<?= $todayEvent_4[5] ?>'>
                                        <button type="button" class="button" id="todayEventBox_4-5" >Invitation Link</button>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="nextDay">
                    <h6 style="text-transform: uppercase">Next Day</h6>
                    <div class="container-fluid">
        
                            <div class="row" class="rounded" id="nextdayEvent_1">
                                <div class="eventBox" id="nextdayEventBox_1">
                                    <div id="nextdayEventBox_1-1"></div>
                                    <div id="nextdayEventBox_1-2"></div>
                                    <br>
                                    <div id="nextdayEventBox_1-3"></div>
                                    <div id="nextdayEventBox_1-4"></div>

                                    <a href='<?= $nextdayEvent_1[5] ?>'>
                                        <button type="button" class="button" id="nextdayEventBox_1-5">Invitation Link</button>
                                    </a>  
                                </div>
                            </div>

                            <div class="row" class="rounded" id="nextdayEvent_2">
                                <div class="eventBox" id="nextdayEventBox_2">
                                    <div id="nextdayEventBox_2-1"></div>
                                    <div id="nextdayEventBox_2-2"></div>
                                    <br>
                                    <div id="nextdayEventBox_2-3"></div>
                                    <div id="nextdayEventBox_2-4"></div>

                                    <a href='<?= $nextdayEvent_2[5] ?>'>
                                        <button type="button" class="button" id="nextdayEventBox_2-5">Invitation Link</button>
                                    </a> 
                                </div>
                            </div>

                            <div class="row" class="rounded" id="nextdayEvent_3">
                                <div class="eventBox" id="nextdayEventBox_3">
                                    <div id="nextdayEventBox_3-1"></div>
                                    <div id="nextdayEventBox_3-2"></div>
                                    <br>
                                    <div id="nextdayEventBox_3-3"></div>
                                    <div id="nextdayEventBox_3-4"></div>

                                    <a href='<?= $nextdayEvent_3[5] ?>'>
                                        <button type="button" class="button" id="nextdayEventBox_3-5">Invitation Link</button>
                                    </a>  
                                </div>
                            </div>

                            <div class="row" class="rounded" id="nextdayEvent_4">
                                <div class="eventBox" id="nextdayEventBox_4">
                                    <div id="nextdayEventBox_4-1"></div>
                                    <div id="nextdayEventBox_4-2"></div>
                                    <br>
                                    <div id="nextdayEventBox_4-3"></div>
                                    <div id="nextdayEventBox_4-4"></div>

                                    <a href='<?= $nextdayEvent_4[5] ?>'>
                                        <button type="button" class="button" id="nextdayEventBox_4-5">Invitation Link</button>
                                    </a>  
                                </div>
                            </div>
                            
                        
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="specialEvents">
                    <div class="text-center">
                        <img class="specialEventsImage" src="images/dec1.jpg"  alt="Italian Trulia"" width="100%" height="auto">
                    </div>
                    <br>
                    <div class="text-center">
                        <h6 style="text-transform: uppercase">Special Events</h6>
                    </div>
                    
                    <div class="container-fluid">

                            <div class="row" class="rounded" id="specialEvent_1">
                                <div class="eventBox" id="specialEventBox_1">
                                    <div id="specialEventBox_1-1"></div>
                                    <div id="specialEventBox_1-2"></div>
                                    <br>
                                    <div id="specialEventBox_1-3"></div>
                                    <div id="specialEventBox_1-4"></div>

                                    <a href='<?= $specialEvent_1[5] ?>'>
                                        <button type="button" class="button" id="specialEventBox_1-5">Launch</button>  
                                    </a> 
                                </div>
                            </div>     
                            
                            <div class="row" class="rounded" id="specialEvent_2">
                                <div class="eventBox" id="specialEventBox_2">
                                    <div id="specialEventBox_2-1"></div>
                                    <div id="specialEventBox_2-2"></div>
                                    <br>
                                    <div id="specialEventBox_2-3"></div>
                                    <div id="specialEventBox_2-4"></div>

                                    <a href='<?= $specialEvent_2[5] ?>'>
                                        <button type="button" class="button" id="specialEventBox_2-5">Launch</button>  
                                    </a>  
                                </div>
                            </div>   
                            
                            <div class="row" class="rounded" id="specialEvent_3">
                                <div class="eventBox" id="specialEventBox_3">
                                    <div id="specialEventBox_3-1"></div>
                                    <div id="specialEventBox_3-2"></div>
                                    <br>
                                    <div id="specialEventBox_3-3"></div>
                                    <div id="specialEventBox_3-4"></div>

                                    <a href='<?= $specialEvent_3[5] ?>'>
                                        <button type="button" class="button" id="specialEventBox_3-5">Launch</button>  
                                    </a>  
                                </div>
                            </div>   

                            <div class="row" class="rounded" id="specialEvent_4">
                                <div class="eventBox" id="specialEventBox_4">
                                    <div id="specialEventBox_4-1"></div>
                                    <div id="specialEventBox_4-2"></div>
                                    <br>
                                    <div id="specialEventBox_4-3"></div>
                                    <div id="specialEventBox_4-4"></div>

                                    <a href='<?= $specialEvent_4[5] ?>'>
                                        <button type="button" class="button" id="specialEventBox_4-5">Launch</button>  
                                    </a>  
                                </div>
                            </div>   


                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
    const today_1 = document.getElementById("todayEvent_1");
    const today_2 = document.getElementById("todayEvent_2");
    const today_3 = document.getElementById("todayEvent_3");
    const today_4 = document.getElementById("todayEvent_4");

    const nextday_1 = document.getElementById("nextdayEvent_1");
    const nextday_2 = document.getElementById("nextdayEvent_2");
    const nextday_3 = document.getElementById("nextdayEvent_3");
    const nextday_4 = document.getElementById("nextdayEvent_4");

    const specialday_1 = document.getElementById("specialEvent_1");
    const specialday_2 = document.getElementById("specialEvent_2");
    const specialday_3 = document.getElementById("specialEvent_3");
    const specialday_4 = document.getElementById("specialEvent_4");

    var numberofEventsToday= '<?= $numberofEventsToday ?>';
    var numberofEventsNextday= '<?= $numberofEventsNextday ?>';
    var numberofSpecialEvents = '<?= $numberofSpecialEvents ?>';


    //today events logic-------------------------------------------------------------------------------------

    document.getElementById("todayEventBox_1-1").innerHTML = '<?= $todayEvent_1[1] ?>';
    document.getElementById("todayEventBox_1-2").innerHTML = '<?= $todayEvent_1[2] ?>';
    document.getElementById("todayEventBox_1-3").innerHTML = "Date- "+'<?= substr($todayEvent_1[3],0,10) ?>';
    document.getElementById("todayEventBox_1-4").innerHTML = "Time- "+'<?= substr($todayEvent_1[4],0,5) ?>';

    document.getElementById("todayEventBox_2-1").innerHTML = '<?= $todayEvent_2[1] ?>';
    document.getElementById("todayEventBox_2-2").innerHTML = '<?= $todayEvent_2[2] ?>';
    document.getElementById("todayEventBox_2-3").innerHTML = "Date- "+'<?= substr($todayEvent_2[3],0,10) ?>';
    document.getElementById("todayEventBox_2-4").innerHTML = "Time- "+'<?= substr($todayEvent_2[4],0,5) ?>';

    document.getElementById("todayEventBox_3-1").innerHTML = '<?= $todayEvent_3[1] ?>';
    document.getElementById("todayEventBox_3-2").innerHTML = '<?= $todayEvent_3[2] ?>';
    document.getElementById("todayEventBox_3-3").innerHTML = "Date- "+'<?= substr($todayEvent_3[3],0,10) ?>';
    document.getElementById("todayEventBox_3-4").innerHTML = "Time- "+'<?= substr($todayEvent_3[4],0,5) ?>';

    document.getElementById("todayEventBox_4-1").innerHTML = '<?= $todayEvent_4[1] ?>';
    document.getElementById("todayEventBox_4-2").innerHTML = '<?= $todayEvent_4[2] ?>';
    document.getElementById("todayEventBox_4-3").innerHTML = "Date- "+'<?= substr($todayEvent_4[3],0,10) ?>';
    document.getElementById("todayEventBox_4-4").innerHTML = "Time- "+'<?= substr($todayEvent_4[4],0,5) ?>';

    
    //nextday event logic---------------------------------------------------------------------------------------------------

    document.getElementById("nextdayEventBox_1-1").innerHTML = '<?= $nextdayEvent_1[1] ?>';
    document.getElementById("nextdayEventBox_1-2").innerHTML = '<?= $nextdayEvent_1[2] ?>';
    document.getElementById("nextdayEventBox_1-3").innerHTML = "Date- "+'<?= substr($nextdayEvent_1[3],0,10) ?>';
    document.getElementById("nextdayEventBox_1-4").innerHTML = "Time- - "+'<?= substr($nextdayEvent_1[4],0,5) ?>';

    document.getElementById("nextdayEventBox_2-1").innerHTML = '<?= $nextdayEvent_2[1] ?>';
    document.getElementById("nextdayEventBox_2-2").innerHTML = '<?= $nextdayEvent_2[2] ?>';
    document.getElementById("nextdayEventBox_2-3").innerHTML = "Date- "+'<?= substr($nextdayEvent_2[3],0,10) ?>';
    document.getElementById("nextdayEventBox_2-4").innerHTML = "Time- - "+'<?= substr($nextdayEvent_2[4],0,5) ?>';

    document.getElementById("nextdayEventBox_3-1").innerHTML = '<?= $nextdayEvent_3[1] ?>';
    document.getElementById("nextdayEventBox_3-2").innerHTML = '<?= $nextdayEvent_3[2] ?>';
    document.getElementById("nextdayEventBox_3-3").innerHTML = "Date- "+'<?= substr($nextdayEvent_3[3],0,10) ?>';
    document.getElementById("nextdayEventBox_3-4").innerHTML = "Time- - "+'<?= substr($nextdayEvent_3[4],0,5) ?>';

    document.getElementById("nextdayEventBox_4-1").innerHTML = '<?= $nextdayEvent_4[1] ?>';
    document.getElementById("nextdayEventBox_4-2").innerHTML = '<?= $nextdayEvent_4[2] ?>';
    document.getElementById("nextdayEventBox_4-3").innerHTML = "Date- "+'<?= substr($nextdayEvent_4[3],0,10) ?>';
    document.getElementById("nextdayEventBox_4-4").innerHTML = "Time- - "+'<?= substr($nextdayEvent_4[4],0,5) ?>';

    //special events logic--------------------------------------------------------------------------------------------

    document.getElementById("specialEventBox_1-1").innerHTML = '<?= $specialEvent_1[1] ?>';
    document.getElementById("specialEventBox_1-2").innerHTML = '<?= $specialEvent_1[2] ?>';
    document.getElementById("specialEventBox_1-3").innerHTML = "Date- "+'<?= substr($specialEvent_1[3],0,10) ?>';
    document.getElementById("specialEventBox_1-4").innerHTML = "Time- "+'<?= substr($specialEvent_1[4],0,5) ?>';

    document.getElementById("specialEventBox_2-1").innerHTML = '<?= $specialEvent_2[1] ?>';
    document.getElementById("specialEventBox_2-2").innerHTML = '<?= $specialEvent_2[2] ?>';
    document.getElementById("specialEventBox_2-3").innerHTML = "Date- "+'<?= substr($specialEvent_2[3],0,10) ?>';
    document.getElementById("specialEventBox_2-4").innerHTML = "Time- "+'<?= substr($specialEvent_2[4],0,5) ?>';

    document.getElementById("specialEventBox_3-1").innerHTML = '<?= $specialEvent_3[1] ?>';
    document.getElementById("specialEventBox_3-2").innerHTML = '<?= $specialEvent_3[2] ?>';
    document.getElementById("specialEventBox_3-3").innerHTML = "Date- "+'<?= substr($specialEvent_3[3],0,10) ?>';
    document.getElementById("specialEventBox_3-4").innerHTML = "Time- "+'<?= substr($specialEvent_3[4],0,5) ?>';

    document.getElementById("specialEventBox_4-1").innerHTML = '<?= $specialEvent_4[1] ?>';
    document.getElementById("specialEventBox_4-2").innerHTML = '<?= $specialEvent_4[2] ?>';
    document.getElementById("specialEventBox_4-3").innerHTML = "Date- "+'<?= substr($specialEvent_4[3],0,10) ?>';
    document.getElementById("specialEventBox_4-4").innerHTML = "Time- "+'<?= substr($specialEvent_4[4],0,5) ?>';


    // remove unwanted event boxes--------------------------------------------------------------------------------------

    if(numberofEventsToday==0){today_1.remove(); today_2.remove(); today_3.remove(); today_4.remove();}
    if(numberofEventsToday==1){today_2.remove(); today_3.remove(); today_4.remove();}
    if(numberofEventsToday==2){today_3.remove(); today_4.remove();}
    if(numberofEventsToday==3){today_4.remove();}

    if(numberofEventsNextday==0){nextday_1.remove(); nextday_2.remove(); nextday_3.remove(); nextday_4.remove();}
    if(numberofEventsNextday==1){nextday_2.remove(); nextday_3.remove(); nextday_4.remove();}
    if(numberofEventsNextday==2){nextday_3.remove(); nextday_4.remove();}
    if(numberofEventsNextday==3){nextday_4.remove();}

    if(numberofSpecialEvents==0){specialday_1.remove(); specialday_2.remove(); specialday_3.remove(); specialday_4.remove();}
    if(numberofSpecialEvents==1){specialday_2.remove(); specialday_3.remove(); specialday_4.remove();}
    if(numberofSpecialEvents==2){specialday_3.remove(); specialday_4.remove();}
    if(numberofSpecialEvents==3){specialday_4.remove();}

    </script>

<script src="js/bootstrap.bundle.js"></script>
<script src="js/date.js"></script>
    
</body>
</html>
