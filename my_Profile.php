<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>EventsWave</title>

    <link rel="icon" href="assets/images/event_accepted_50px.png" type="image/icon type">

    <link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/profile-page.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="notifast/notifast.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .profile-head {
            transform: translateY(5rem)
        }

        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css");

        .cover {
            background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px;
        }

        body {
            background: #ffffff;
            min-height: 100vh;
            overflow-x:hidden;
        }

        @media (max-width: 800px)
        {
            .edit-profile button{

                display: none;
            }
        }
    </style>
</head>

<body>

<?php

include("config.php");

session_start();

if(!isset($_SESSION['id']))
{
  header('location: login.php');

  exit;
}

?>

<?php if(isset($_GET['error_message'])){ ?>

    <?php

    $message = $_GET['error_message'];

    echo"<body onload='notification_function(`Error Message`, `$message`, `#da1857`);'</body>"

    ?>

<?php }?>

<?php if(isset($_GET['success_message'])){ ?>

    <?php

    $message = $_GET['success_message'];

    echo"<body onload='notification_function(`Success Message`, `$message`, `#0F73FA`);'</body>"

    ?>

<?php }?>

<nav class="navbar">

    <div class="nav-wrapper">

        <img src="assets/images/black_logo.png" class="brand-img" id="logo-img">


        <div class="nav-items">

            <a href="logout.php" style="text-decoration: none; color: #1c1f23"><i class="icon fas fa-sign-out-alt fa-lg"></i></a>

            <a href="edit-profile.php" style="text-decoration: none; color: #1c1f23"><i class="icon fas fa-wrench fa-lg"></i></a>

            <i class="icon fas fa-calendar-alt fa-lg"></i>

        </div>

    </div>

</nav>

<div class="row py-6 px-4"><div class="col-md-11 mx-auto">

        <div class="bg-white shadow rounded overflow-hidden">

            <div class="px-4 pt-0 pb-4 cover">

                <div class="media align-items-end profile-head">

                    <div class="profile mr-3">

                        <img src="<?php echo "assets/images/profiles/".$_SESSION['img_path'] ?>"  width="160" style="border-radius: 50%;">

                        <br>

                        <form method="post" action="update-profile.php" class="edit-profile">

                                <button type="submit" class="btn btn-outline-light btn-sm btn-block mt-2">Edit Profile</button>
                        </form>

                    </div>

                    <div class="media-body mb-5 text-white">

                        <h4 class="mt-0 mb-0"><?php echo $_SESSION['username'] ?></h4>

                        <p class="small mb-4"><?php echo $_SESSION['fullname'] ?></p>

                    </div>

                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-end text-center">

                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><h5 class="font-weight-bold mb-0 d-block"><?php echo $_SESSION['postcount'] ?></h5><small class="text-muted">

                            <i class="fas fa-image mr-1"></i><a href="All-Media.php" style="text-decoration: none; color: #1c1f23;">Posts</small></a></li>

                    <li class="list-inline-item"> <h5 class="font-weight-bold mb-0 d-block"><?php echo $_SESSION['fallowers'] ?></h5><small class="text-muted">

                            <i class="fas fa-user mr-1""></i><a href="Info.php" style="text-decoration: none; color: #1c1f23;">Followers</small></a></li>

                    <li class="list-inline-item"> <h5 class="font-weight-bold mb-0 d-block"><?php echo $_SESSION['fallowing'] ?></h5><small class="text-muted">

                            <i class="fas fa-user mr-1"></i><a href="Info.php" style="text-decoration: none; color: #1c1f23;">Following</small></a></li>
                </ul>

            </div>

            <div class="px-4 py-3">

                <h5 class="mb-0">About</h5>

                <div class="p-4 rounded shadow-sm bg-light">

                    <p class="font-italic mb-0"><?php echo " ".$_SESSION['bio']?></p>

                </div>
            </div>

            <div class="px-4 py-3">

                <h5 class="mb-0">Social</h5>

                <div class="p-4 rounded shadow-sm bg-light">

                    <p class="mb-3 font-italic"><i class="bi bi-envelope fa-lg m-lg-2"></i>Email : <?php echo " ".$_SESSION['email'] ?></p>

                    <p class="mb-3 font-italic"><i class="bi bi-box-arrow-up-right fa-lg m-lg-2"></i>FaceBook : <?php echo " ".$_SESSION['facebook'] ?></p>

                    <p class="mb-3 font-italic"><i class="bi bi-whatsapp fa-lg m-lg-2"></i>WhatsApp : <?php echo " ".$_SESSION['whatsapp'] ?></p>

                </div>


            </div>

            <div class="py-4 px-4">

                <div class="d-flex align-items-center justify-content-between mb-3">

                    <h5 class="mb-0">Recent photos</h5>

                    <p class="mb-0"><a href="All-Media.php" class="text-muted">Show all</a></p>

                </div> <div class="row">

                    <div class="gallery">


                        <?php include("get-posts.php"); ?>

                        <!--loop over the results-->

                        <?php foreach($posts as $post){ ?>

                            <div class="gallery-items">

                                <img src="<?php echo "./assets/images/posts/".$post['Img_Path'];?>" alt="post" class="gallery-img">

                                <div class="gallery-item-info">

                                    <ul>

                                        <li class="gallery-items-likes"><span class="hide-gallery-elements">Reactions : <?php echo $post['Likes'];?></span>

                                            <i class="icon fas fa-thumbs-up"></i>

                                        </li>

                                        <li class="gallery-items-likes"><span class="hide-gallery-elements">Opinions</span>

                                            <a href="single-post.php?post_id=<?php echo $post['Post_ID'];?>" style="color: white" target="_blank"><i class="icon fas fa-comment"></i></a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        <?php } ?></div>
                    </div>

                </div>

            </div>

        </div>

    </div>

<!-- Model For Show Followers -->

<nav aria-label="Page navigation example" style="display:flex; justify-content: center">
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
        <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';}?>">
            <a class="page-link" href="<?php if($page_no>=$total_no_of_pages){echo "#";}else{ echo "?page_no=".($page_no+1);}?>">Next</a>
        </li>
    </ul>
</nav>

</body>

<script src="notifast/notifast.min.js"></script>

<script src="notifast/function.js"></script>

<script type="text/javascript">
    document.getElementById("logo-img").onclick = function () {
        location.href = "home.php";
    };
</script>

</html>