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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


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
    </style>
</head>

<body>

<?php

include("config.php");

if(isset($_POST['target_id']))
{
    $target_id = $_POST['target_id'];

    $sql = "SELECT * FROM Users WHERE User_ID = $target_id;";

    $stmt = $conn->prepare($sql);

    if($stmt->execute())
    {
        $user_array = $stmt->get_result();
    }
    else{
        header("location: home.php");

        exit;
    }
}
else
{
    header("location: home.php");
}
?>


<nav class="navbar">

    <div class="nav-wrapper">

        <img src="assets/images/black_logo.png" class="brand-img" id="logo-img">

        <div class="nav-items">

            <a href="Events.php" style="text-decoration: none; color: #1c1f23"><i class="icon fas fa-flag fa-lg"></i></a>

            <a href="shorts.php" style="text-decoration: none; color: #1c1f23"><i class="icon fas fa-video fa-lg"></i></a>

            <i class="icon fas fa-calendar-alt fa-lg"></i>

            <div class="icon user-profile">

                <a href="my_Profile.php" ><i class="fas fa-user-circle fa-lg"></i></a>

            </div>

        </div>

    </div>

</nav>

<?php foreach ($user_array as $array_user){?>

    <div class="row py-6 px-4"><div class="col-md-11 mx-auto">

        <div class="bg-white shadow rounded overflow-hidden">

            <div class="px-4 pt-0 pb-4 cover">

                <div class="media align-items-end profile-head">

                    <div class="profile mr-3">

                        <img src="<?php echo "assets/images/profiles/".$array_user['IMAGE'] ?>"  width="160" style="border-radius: 50%;">

                        <br>

                        <?php include('Check_FallowStatus.php');?>

                        <?php if($following_status){?>

                            <form method="post" action="Unfollow_User.php">

                                <input type="hidden" value="<?php echo $array_user['User_ID']?>" name="other_User_Id">

                                <button type="submit" name="unfollow" class="btn btn-outline-light btn-sm btn-block mt-2">Unfollow</button>

                            </form>
                        <?php }else{ ?>

                            <form method="post" action="fallow_user.php">

                                <input type="hidden" name="fallow_person" value='<?php echo $array_user['User_ID'];?>'>

                                <button type="submit" name="fallow" class="btn btn-outline-light btn-sm btn-block mt-2">Follow</button>

                            </form>
                        <?php }?>




                    </div>

                    <div class="media-body mb-5 text-white">

                        <h4 class="mt-0 mb-0"><?php echo $array_user['USER_NAME'] ?></h4>

                        <p class="small mb-4"><?php echo $array_user['FULL_NAME'] ?></p>
                </div>

            </div>
            </div>

        <div class="bg-light p-4 d-flex justify-content-end text-center">

            <ul class="list-inline mb-0">
                <li class="list-inline-item"><h5 class="font-weight-bold mb-0 d-block"><?php echo $array_user['POSTS'] ?></h5><small class="text-muted">

                    <i class="fas fa-image mr-1"></i>Photos</small> </li>

                <li class="list-inline-item"> <h5 class="font-weight-bold mb-0 d-block"><?php echo $array_user['FALLOWERS'] ?></h5><small class="text-muted">

                    <i class="fas fa-user mr-1"></i>Followers</small> </li>

                <li class="list-inline-item"> <h5 class="font-weight-bold mb-0 d-block"><?php echo $array_user['FALLOWING'] ?></h5><small class="text-muted">

                    <i class="fas fa-user mr-1"></i>Following</small> </li>
            </ul>
        </div>

        <div class="px-4 py-3">

            <h5 class="mb-0">About</h5>

            <div class="p-4 rounded shadow-sm bg-light">

                <p class="font-italic mb-0"><?php echo " ".$array_user['BIO'] ?></p>

            </div>
        </div>

        <div class="px-4 py-3">

            <h5 class="mb-0">Social</h5>

                <div class="p-4 rounded shadow-sm bg-light">

                    <p class="mb-3 font-italic"><i class="bi bi-envelope fa-lg m-lg-2"></i>Email : <?php echo " ".$array_user['email'] ?></p>

                    <p class="mb-3 font-italic"><i class="bi bi-box-arrow-up-right fa-lg m-lg-2"></i>FaceBook : <?php echo " ".$array_user['facebook'] ?></p>

                    <p class="mb-3 font-italic"><i class="bi bi-whatsapp fa-lg m-lg-2"></i>WhatsApp : <?php echo " ".$array_user['whatsapp'] ?></p>

                </div>
        </div>

<?php }?>

        <div class="py-4 px-4">


            <div class="d-flex align-items-center justify-content-between mb-3">


                <h5 class="mb-0">Recent photos</h5>

            </div> <div class="row">

                <div class="gallery">


                    <?php include("get_targetPosts.php"); ?>

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

                                        <a href="single-post.php?post_id=<?php echo $post['Post_ID'];?>" target="_blank" style="color: white"><i class="icon fas fa-comment"></i></a>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    <?php } ?></div>
            </div>

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
