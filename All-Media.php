<?php

include 'Media-Provider.php';

if(!isset($_SESSION['id']))
{
    header('location: login.php');

    exit;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title>EventsWave</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/profile-page.css">

    <link rel="stylesheet" href="assets/css/section.css">

    <link rel="stylesheet" href="assets/css/posting.css">

    <link rel="stylesheet" href="assets/css/right_col.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/discover.css">

    <link rel="stylesheet" href="assets/css/results.css">

    <style>
        .post-source {

            width: 100%;

            height: 500px;

            object-fit: cover;

            border-radius: 10px;

        }

    </style>

</head>

<body>

<div class="container">

    <nav class="navbar">

        <div class="nav-wrapper">

            <img src="assets/images/black_logo.png" class="brand-img" id="logo-img">

            <div class="nav-items">

                <div class="icon user-profile">

                    <a href="my_Profile.php" style="text-transform: none; color: #1c1f23;"><i class="fas fa-user-circle fa-lg"></i></a>

                </div>

            </div>

        </div>

        <?php

        include('config.php');

        $id = $_SESSION['id'];

        $SQL = "SELECT * FROM posts WHERE User_ID = $id;";

        $stmt = $conn->prepare($SQL);

        $stmt->execute();

        $posts = $stmt->get_result();

        ?>

    </nav>
    <br><br><br>

    <h3>All Posts<small></small></h3><br>


    <ul class="nav nav-pills nav-justified">

        <li class="active"><a data-toggle="pill" href="#home"><i class="icon fas fa-vote-yea fa-lg"></i>Posts</a></li>

        <li><a data-toggle="pill" href="#menu3"><i class="icon fas fa-video fa-lg"></i>Videos</a></li>

        <li><a data-toggle="pill" href="#menu-4"><i class="icon fas fa-calendar-check fa-lg"></i>Events</a></li>

    </ul>

    <div class="tab-content">

        <div id="home" class="tab-pane fade in active">

            <main>

                <div class="discover-container">

                    <div class="gallery">

                        <?php foreach ($posts as $post) { ?>
                            <div class="gallery-items">

                                <img src="<?php echo "assets/images/posts/" . $post['Img_Path']; ?>" alt="post"
                                     class="gallery-img">

                                <div class="gallery-item-info">

                                    <ul>

                                        <li class="gallery-items-likes"><span
                                                    class="hide-gallery-elements"><?php echo $post['Likes']; ?></span>

                                            <i class="icon fas fa-thumbs-up"></i>

                                        </li>

                                        <li class="gallery-items-likes"><span class="hide-gallery-elements">Opinions</span>

                                            <a href="single-post.php?post_id=<?php echo $post['Post_ID'];?>" style="color: white" target="_blank"><i class="icon fas fa-comment"></i></a>

                                        </li>
                                    </ul>

                                </div>

                            </div>

                        <?php } ?>

                    </div>

                </div>

            </main>

        </div>

        <div id="menu-4" class="tab-pane fade">

            <br>
            <ul class="list-group">

                <?php

                $events = find_Events();

                foreach($events as $event){?>

                    <div class="result-section">

                        <li class="list-group-item search-result-item">

                            <img src="assets/images/calender.jpg" alt="profile-image">

                            <div class="profile_card" style="margin-left: 20px;">

                                <div>
                                    <p class="username"
                                       style="text-transform: capitalize; font-weight: bold;"><?php echo $event['Caption']; ?></p>

                                    <p class="sub-text"><?php echo "Post Uploaded : ".$event['Date_Upload']; ?></p>
                                </div>

                            </div>

                            <div class="search-result-item-button">

                                <button style="background: white none" class="btn btn-outline-primary">
                                    <a style="font-weight: bold; text-decoration: none;" href="Single-Event.php?post_id=<?php echo $event['Event_ID']; ?>" target="_blank">

                                        View Event</a></button>
                            </div>

                        </li>
                        <br>

                    </div>
                <?php }?>

            </ul>
        </div>

        <div id="menu3" class="tab-pane fade">

            <br>

            <ul class="list-group">

                <?php

                $shorts = find_Shorts();

                foreach ($shorts

                as $video){
                ?>

                <div class="result-section">

                    <li class="list-group-item search-result-item">

                        <img src="assets/images/video.png" alt="profile-image">

                        <div class="profile_card" style="margin-left: 20px;">

                            <div>
                                <p class="username"

                                    <?php $vid_data = "Single-Video.php?post_id= ".$video['Video_ID'];?>

                                    <?php $new_string =  mb_strimwidth($video['Caption'], 0, 200, "....<br><a href='$vid_data'> Read More</a>");?>

                                   style="text-transform: capitalize; font-weight: bold; font-size: 13px;"><?php echo $new_string ?></p>

                            </div>

                        </div>

                        <div class="search-result-item-button">

                            <button style="background: white none" class="btn btn-outline-primary">
                                <a style="text-decoration: none; font-weight: bold;" href="Single-Video.php?post_id=<?php echo $video['Video_ID']; ?>" target="_blank">
                                    View Video
                                </a>
                            </button>
                        </div>

                    </li>
                    <br>

                </div>

                <?php } ?>
            </ul>
        </div>
    </div>


</div>

</body>

<script type="text/javascript">
    document.getElementById("logo-img").onclick = function () {
        location.href = "home.php";
    };
</script>

</html>
