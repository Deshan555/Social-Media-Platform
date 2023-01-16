<?php

require 'init.php';

session_regenerate_id(true);

if(!isset($_SESSION['id']))
{
    header('location: login.php');

    exit;
}

?>

<!DOCTYPE html>

<html lang="en">

<head id="head">
    <meta charset="UTF-8">

    <title>EventsWave</title>

    <link rel="icon" href="assets/images/event_accepted_50px.png" type="image/icon type">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/section.css">

    <link rel="stylesheet" href="assets/css/right_col.css">

    <link rel="stylesheet" href="assets/css/posting.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/profile-card.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" id="js_2"/>

    <link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet" id="js_1">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        .post-source{
            
            width: 100%;
            
            height: 500px;
            
            object-fit: cover;
            
            border-radius: 10px;
        
        }
         .style-wrapper{

             width: 90%;

             height: 100px;

             background:  #F5F5F5;

             border: 1px solid #fdfdfd;

             padding: 10px;

             padding-right: 0;

             display: flex;

             align-items: center;

             overflow: hidden;

             border-radius: 10px;
         }

    </style>

</head>

<body>

<!-- Nav Bar Design -->

  <nav class="navbar">

      <div class="nav-wrapper">

          <img src="assets/images/black_logo.png" class="brand-img" id="logo-img">

          <div class="nav-items">

              <i class="icon fas fa-search fa-lg" data-bs-toggle="modal" data-bs-target="#search-model"></i>

              <a href="Events.php" style="text-decoration: none; color: #1c1f23"><i class="icon fas fa-flag fa-lg"></i></a>

              <i class="icon fas fa-calendar-alt fa-lg"></i>

              <div class="icon user-profile">

                  <a href="my_Profile.php" ><i class="fas fa-user-circle fa-lg"></i></a>

              </div>

          </div>

      </div>

  </nav>

<!-- Search Modal -->
<div class="modal fade" id="search-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" action="Results.php">
                    <input type="search" name="find" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </form>
            </div>
        </div>
    </div>
</div>

<!-- New Section -->


<section class="main">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col" id="left-col">

                <?php

                include('get_latest_videos.php');

                include('get_dataById.php');

                foreach($posts as $post)
                {
                    $data = get_UserData($post['User_ID']);

                    $profile_img = $data[2];

                    $profile_name = $data[0];

                    ?>

                    <div class="post">

                        <div class="info">

                            <div class="user">

                                <div class="profile-pic"><img src="<?php echo "assets/images/profiles/". $profile_img; ?>"></div>

                                <p class="username"><?php echo $profile_name;?></p>

                            </div>

                        </div>


                        <video preload="none" poster="<?php echo 'assets/videos/'. $post['Thumbnail_Path']; ?>" controls class="post-source">
                            <source src="<?php echo 'assets/videos/'.$post['Video_Path'];?>" type="video/mp4" type="video/mp4">
                        </video>


                        <?php $element_id = rand(10,1000000); ?>

                        <div id="<?php echo $element_id ?>">

                            <div class="post-content">

                                <div class="reactions-wrapper" id="reaction">

                                    <?php

                                    include('check_like_statusVid.php');?>

                                    <?php if($reaction_status){?>

                                        <form>
                                            <input type="hidden" value="<?php echo $post['Video_ID'];?>" name="post_id">
                                            <button style="background: none; border: none;" type="submit" name="reaction">
                                                <i style="color: #fb3958;" class="icon fas fa-heart" onclick="return unlike(<?php echo $post['Video_ID'];?>);"></i>
                                            </button>
                                        </form>

                                    <?php } else{?>

                                        <form>
                                            <input type="hidden" value="<?php echo $post['Video_ID'];?>" name="post_id">
                                            <button style="background: none; border: none;" type="submit" name="reaction">
                                                <i style="color: #22262A;" class="icon fas fa-heart" onclick="return like(<?php echo $post['Video_ID'];?>);"></i>
                                            </button>
                                        </form>

                                    <?php }?>

                                    <a href="Single-Video.php?post_id=<?php echo $post["Video_ID"];?>" style="color: #22262A;"><i class="icon fas fa-comment"></i></a>

                                </div>

                                <p class="reactions"><?php echo $post['Likes'];?> Reactions</p>

                                <p class="description">
                                    <span><?php echo $profile_name;?> Says :<br></span>

                                    <?php echo $post['Caption'];?>
                                </p>

                                <p class="post-time"><?php echo date("M,Y,d", strtotime($post['Date_Upload']));?></p>

                                <p class="post-time" style="color: #0b5ed7"><?php echo $post['HashTags'];?></p>

                            </div>

                        </div>
                    </div>

                <?php } ?>


            <!--Pagination bar-->
            <nav aria-label="Page navigation example" class="mx-auto mt-3">

                <ul class="pagination">

                    <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">

                        <a class="page-link" href="<?php if($page_no<=1){echo'#';}else{ echo '?page_no='. ($page_no-1); }?>">Previous</a>

                    </li>
                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>

                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                    <li class="page-item"><a class="page-link" href="?page_no=3">3</a></li>
                    <?php if($page_no >= 3){?>

                        <li class="page-item"><a class="page-link" href="#">...</a></li>

                        <li class="page-item"><a class="page-link" href="<?php echo "?page_no=". $page_no;?>"></a></li>

                    <?php } ?>

                    <li class="page-item <?php if($page_no>= $total_number_pages){echo 'disabled';}?>">

                        <a class="page-link" href="<?php if($page_no>=$total_number_pages){echo "#";}else{ echo "?page_no=".($page_no+1);}?>">Next</a>

                    </li>
                </ul>
            </nav>
        </div>

        <!-- Design for right column -->

        <div class="right-col">

            <!-- structure for profile card section-->

            <!-- structure for profile card section-->
            <div class="style-wrapper mt-2" style="background: #F5F5F5;">

                <div class="suggestion_card">

                    <div>
                        <img src="<?php echo "assets/images/profiles/".$_SESSION['img_path'];?>" style="border-radius: 50%; width: 60px; height: 60px; vertical-align: middle; float: left; margin-top: 6px;">
                    </div>

                    <div>
                        <p class="username" style="margin-left: 8px;"><?php echo $_SESSION['username'];?></p>

                        <p class="sub-text" style="margin-left: 19px;"><?php echo $_SESSION['fullname'];?></p>

                    </div>

                    <a href="logout.php"><button class="fallow-btn" style="margin-left: 30px; font-size: small">LOG OUT</button></a>

                </div>

            </div>

            <p class="suggesting">Recommendation For You</p>

            <?php include("get_suggestions.php"); ?>

            <?php foreach($suggestions as $suggestion){?>

                <?php if($suggestion['User_ID']!= $_SESSION['id']){?>

                    <div class="profile-cards">

                        <form id="suggestion_form<?php echo $suggestion['User_ID'];?>" method="post" action="follower_acc.php">

                            <input type="hidden" value="<?php echo $suggestion['User_ID']?>" name="target_id">

                            <div class="profile-pics">

                                <img src= "<?php echo "assets/images/profiles/".$suggestion['IMAGE'];?>" alt="profile-user" onclick="document.getElementById('suggestion_form'+<?php echo $suggestion['User_ID'];?>).submit();">

                            </div>

                        </form>

                        <div>

                            <?php $new_string =  mb_strimwidth($suggestion['FULL_NAME'], 0, 10, "..");?>

                            <p class="username"><?php echo $suggestion['USER_NAME'];?></p>

                            <p class="sub-text"><?php echo $new_string?></p>
                        </div>

                        <form method="POST" action="fallow_user.php">

                            <input type="hidden" name="fallow_person" value='<?php echo $suggestion['User_ID'];?>'>

                            <button type="submit" class="action-btn" name="fallow">follow</button>

                        </form>

                    </div>

                <?php } ?>

            <?php }?>

            <?php

            $SQL = "SELECT * FROM events ORDER BY Event_ID DESC LIMIT 1;";

            $result = $conn->query($SQL);

            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $Event_Caption = $row["Caption"];

                    $Event_Date = $row["Event_Date"];

                    $Event_ID = $row["Event_ID"];

                    $Poster = $row["Event_Poster"];
                }
            }
            $conn->close();

            ?>
            <p class="suggesting">Upcoming Events</p>

            <div class="card" style="width: 90%; border-radius: 10px; background: #F5F5F5; border: 1px solid #fdfdfd;">

                <img src="<?php echo "assets/images/posts/". $Poster; ?>" class="card-img-top" alt="Event_Card" style="border-radius: 10px;">

                <div class="card-body">

                    <h6 class="card-title"><?php echo 'Date : '.date("M,Y,d", strtotime($Event_Date))?></h6>

                    <p class="card-text" style="font-size: 14px;"><?php echo $Event_Caption?></p>

                    <form>
                        <button class="fallow-btn" style="font-size: 12px;"><a href="Single-Event.php?post_id=<?php echo $Event_ID;?>">Read More</a></button>
                    </form>
                </div>

            </div>
        </div>

    </div>


</section>

<script type="text/javascript">
    document.getElementById("logo-img").onclick = function ()
    {
        location.href = "home.php";
    };
</script>

<script type="text/javascript">

    function like(post_id){

        $.ajax({
            type:"post",
            url:"like_vid.php",
            data:
                {
                    'post_id' :post_id,
                },
            cache:false,
            success: function (html)
            {
                $('#left-col').load(document.URL +  ' #left-col');

            }
        });
        return false;
    }

    function unlike(post_id, div_id){

        $.ajax({
            type:"post",
            url:"unlike_vid.php",
            data:
                {
                    'post_id' :post_id,
                },
            cache:false,
            success: function (html)
            {
                $('#left-col').load(document.URL +  ' #left-col');
            }
        });
        return false;
    }

    /*$(document).bind("contextmenu",function(e){
        return false;
    });*/

</script>

</body>

</html>

