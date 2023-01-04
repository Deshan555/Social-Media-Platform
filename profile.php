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

<head>
  <meta charset="UTF-8">

  <title>Title</title>

  <link rel="icon" href="assets/images/event_accepted_50px.png" type="image/icon type">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <title>Document</title>

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="assets/css/profile-page.css">

  <link rel="stylesheet" href="assets/css/section.css">

  <link rel="stylesheet" href="assets/css/posting.css">

  <link rel="stylesheet" href="assets/css/right_col.css">

  <link rel="stylesheet" href="assets/css/responsive.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="notifast/notifast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<!-- Nav Bar Design -->

<nav class="navbar">

  <div class="nav-wrapper">

      <img src="assets/images/black_logo.png" class="brand-img">

      <div class="nav-items">

          <i class="icon fas fa-home fa-lg"></i>

          <i class="icon fas fa-plus-square fa-lg"></i>

          <i class="icon fas fa-calendar-alt fa-lg"></i>

          <i class="icon fas fa-heart fa-lg"></i>

      </div>

  </div>

</nav>

<header class="profile-header">

  <div class="profile-container">

    <div class="profile">

      <div class="profile-image">

        <img src="<?php echo $_SESSION['img_path'] ?>" alt="profile picture">

      </div>

      <div class="profile-user-settings">

        <h1 class="profile-user-name"><?php echo $_SESSION['username']; ?></h1>

        <button class="profile-button profile-edit-button">Edit Profile</button>

        <button class="profile-button profile-settings-btn" aria-label="profile settings" data-bs-toggle="modal" data-bs-target="#exampleModal">

          <i class="icon fas fa-cog"></i>

        </button>



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog">

            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quick Actions</h5>
              </div>

                <div class="modal-body">
                  <ul style="list-style: none; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 10px; text-decoration: none;">
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-cog"></i></button><a href="edit-profile.php">Profile Edit<a></li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-calendar-week"></i></i></button><a href="">Post About New Event</a></li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-pen"></i></i></button><a href="post-uploader.php">Create New Post</a></li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-video"></i></i></button><a href="">Publish New Short video</a></li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-sign-out-alt"></i></i></button><a href="logout.php">Log Out</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>

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
      
      <!--<div class="popup" id="popup">

          <div class="popup-window">


          </div>
        
        </div>

      </div>-->

      <div class="profile-status">

        <ul>
          <li><span class="profile-status-count"><?php echo $_SESSION['fallowers'] ?></span> Posts</li>

          <li><span class="profile-status-count"><?php echo $_SESSION['fallowing'] ?></span> Fallowing</li>

          <li><span class="profile-status-count"><?php echo $_SESSION['fallowers'] ?></span> Followers</li>

        </ul>

      </div>

      <div class="social">

        <ul>
          <li><i class="fas fa-envelope fa-lg"></i><?php echo " ".$_SESSION['email'] ?></li>

          <li><i class="fab fa-facebook-square fa-lg"></i><?php echo " ".$_SESSION['facebook'] ?></li>

          <li><i class="fab fa-whatsapp-square fa-lg"></i><?php echo " ".$_SESSION['whatsapp'] ?></li>

          <i class="fad fa-campfire"></i>

        </ul>

      </div>

      <div class="profile-bio">

        <p><span class="profile-real-name"><?php echo $_SESSION['fullname']?></span> <?php echo " ".$_SESSION['bio']?> </p>

      </div>

    </div>

  </div>

</header>

<!-- design photo gallery -->

<main>

  <div class="profile-container">

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

            </li><br>
            
          </ul>

        </div>

      </div>

    <?php } ?>

    </div>

  </main>

</body>

<script src="notifast/notifast.min.js"></script>

<script src="notifast/function.js"></script>

</html>