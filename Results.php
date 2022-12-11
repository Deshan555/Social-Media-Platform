<?php  include('Results_Provider.php'); ?>

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

            <img src="assets/images/black_logo.png" class="brand-img">

            <div class="nav-items">

                <a href="home.php" style="text-transform: none; color: #1c1f23"><i class="icon fas fa-home fa-lg"></i></a>

                <div class="icon user-profile">

                    <a href="my_Profile.php" style="text-transform: none; color: #1c1f23;"><i class="fas fa-user-circle fa-lg"></i></a>

                </div>

            </div>

        </div>

        <?php

        include('config.php');


        if (isset($_POST['find'])) {

            $search_input = $_POST['find'];

            $SQL = "SELECT * FROM posts WHERE Caption LIKE '%$search_input%' OR HashTags LIKE '%$search_input%';";

            $stmt = $conn->prepare($SQL);

            $stmt->execute();

            $posts = $stmt->get_result();
        } else {
            $search_input = "car";

            $stmt = $conn->prepare("SELECT * FROM posts WHERE Caption like ? OR HashTags like ? limit 12");

            $stmt->bind_param("ss", strval("%" . $search_input . "%"), strval("%" . $search_input . "%"));

            $stmt->execute();

            $posts = $stmt->get_result();
        }
        ?>

    </nav>
    <br><br><br>

    <h3>Search Results For <small><?php echo $search_input?></small></h3><br>


    <ul class="nav nav-pills nav-justified">

        <li class="active"><a data-toggle="pill" href="#home"><i class="icon fas fa-vote-yea fa-lg"></i>Posts</a></li>

        <li><a data-toggle="pill" href="#menu2"><i class="icon fas fa-users fa-lg"></i>Profiles</a></li>

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
        <div id="menu2" class="tab-pane fade">

            <br>

            <ul class="list-group">

                <?php

                $users = find_Users($search_input);

                foreach ($users as $members) {
                    ?>

                    <div class="result-section">

                        <li class="list-group-item search-result-item">

                            <img src="<?php echo "assets/images/profiles/" . $members['IMAGE']; ?>" alt="profile-image">

                            <div class="profile_card" style="margin-left: 20px;">

                                <div>
                                    <p class="username"><?php echo $members['FULL_NAME']; ?></p>

                                    <p class="sub-text"><?php echo $members['USER_NAME']; ?></p>

                                </div>

                            </div>

                            <div class="search-result-item-button">

                                <form method="post" action="follower_acc.php">
                                    <input type="hidden" value="<?php echo $members['User_ID'] ?>" name="target_id">

                                    <button type="submit" class="btn btn-outline-primary">Visit Profile</button>
                                </form>

                            </div>

                        </li>
                        <br>

                    </div>

                <?php } ?>
            </ul>

        </div>

        <div id="menu-4" class="tab-pane fade">

            <br>
            <ul class="list-group">

                <?php

                $events = find_Events($search_input);

                foreach($events as $event){?>

                <div class="result-section">

                    <li class="list-group-item search-result-item">

                        <img src="assets/images/calender.jpg" alt="profile-image">

                        <div class="profile_card" style="margin-left: 20px;">

                            <div>
                                <p class="username"
                                   style="text-transform: capitalize;"><?php echo $event['Caption']; ?></p>

                                <p class="username"
                                   style="text-transform: capitalize; color: #0b5ed7"><?php echo $event['HashTags']; ?></p>

                                <p class="username">

                                    <a href="Single-Event.php?post_id=<?php echo $event['Event_ID']; ?>"
                                       target="_blank"><i class="icon fas fa-eye fa-lg"></i></a>
                                </p>

                            </div>

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

                $shorts = find_Shorts($search_input);

                foreach ($shorts

                as $video){
                ?>

                <div class="result-section">

                    <li class="list-group-item search-result-item">

                        <img src="assets/images/video.png" alt="profile-image">

                        <div class="profile_card" style="margin-left: 20px;">

                            <div>
                                <p class="username"
                                   style="text-transform: capitalize;"><?php echo $video['Caption']; ?></p>

                                <p class="username"
                                   style="text-transform: capitalize; color: #0b5ed7"><?php echo $video['HashTags']; ?></p>

                                <p class="username">

                                    <i class="icon fas fa-play-circle fa-lg" class="btn btn-outline-primary btn-sm"
                                       data-toggle="modal" data-target="#exampleModal"></i>

                                    <a href="Single-Video.php?post_id=<?php echo $video['Video_ID']; ?>"
                                       target="_blank"><i class="icon fas fa-eye fa-lg"></i></a>

                                </p>

                            </div>

                        </div>

                    </li>
                    <br>

                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <video controls class="post-source">

                                    <source src="<?php echo 'assets/videos/' . $video['Video_Path']; ?>"
                                            type="video/mp4">

                                </video>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <?php } ?>
    </ul>
</div>

</body>
</html>
