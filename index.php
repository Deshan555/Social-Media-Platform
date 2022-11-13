
<?php 

session_start();

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/section.css">

    <link rel="stylesheet" href="assets/css/posting.css">

    <link rel="stylesheet" href="assets/css/right_col.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

<!-- Nav Bar Design -->

  <nav class="navbar">

      <div class="nav-wrapper">

          <img src="assets/images/black_logo.png" class="brand-img">

          <form>
              <input type="text" class="search-box" placeholder="search">
          </form>

          <div class="nav-items">

              <i class="icon fas fa-home fa-lg"></i>

              <i class="icon fas fa-plus-square fa-lg"></i>

              <i class="icon fas fa-calendar-alt fa-lg"></i>

              <i class="icon fas fa-heart fa-lg"></i>

              <div class="icon user-profile">

                  <i class="fas fa-user-circle fa-lg"></i>

              </div>

          </div>

      </div>

  </nav>


<!-- New Section -->


<section class="main">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col">

            <!-- Wrapper For Status -->

            <div class="status-wrapper">

                <!-- sample data -->

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

                <div class="status-card">

                    <div class="profile-pic"><img src="assets/images/default.png"> </div>

                    <p class="username">User Name</p>

                </div>

            </div>

            <!-- Wrapper for posting -->

            <div class="post">

                <div class="info">

                    <div class="user">

                        <div class="profile-pic"><img src="assets/images/default.png"></div>

                        <p class="username">SLTC Leo Club</p>

                    </div>

                    <i class="fas fa-ellipsis-v options"></i>

                </div>

                <img src="assets/images/posts/post.jpg" class="post-img">

                <div class="post-content">

                    <div class="reactions-wrapper">

                        <i class="icon fas fa-thumbs-up"></i>

                        <i class="icon fas fa-comment"></i>

                        <i class="icon fas fa-calendar-alt"></i>

                    </div>

                    <p class="reactions">1,789 Reactions</p>

                    <p class="description">
                        <span>Username Says : <br></span>
                        I got my peaches out in Georgia (oh, yeah, shit)
                        I get my weed from California (that's that shit)
                        I took my chick up to the North, yeah (badass bitch)
                        I get my light right from the source, yeah (yeah, that's it)
                    </p>

                    <p class="post-time">2022/11/5</p>

                </div>

                <div class="comments-section">

                    <img src="assets/images/default.png" class="icon">

                    <input type="text" class="comment-box" placeholder="Your Opinion">

                    <button class="comment-button">WRITE</button>

                </div>

            </div>

            <div class="post">

                <div class="info">

                    <div class="user">

                        <div class="profile-pic"><img src="assets/images/default.png"></div>

                        <p class="username">SLTC Leo Club</p>

                    </div>

                    <i class="fas fa-ellipsis-v options"></i>

                </div>

                <img src="assets/images/posts/post.jpg" class="post-img">

                <div class="post-content">

                    <div class="reactions-wrapper">

                        <i class="icon fas fa-thumbs-up"></i>

                        <i class="icon fas fa-comment"></i>

                        <i class="icon fas fa-calendar-alt"></i>

                    </div>

                    <p class="reactions">1,789 Reactions</p>

                    <p class="description">
                        <span>Username Says : <br></span>
                        I got my peaches out in Georgia (oh, yeah, shit)
                        I get my weed from California (that's that shit)
                        I took my chick up to the North, yeah (badass bitch)
                        I get my light right from the source, yeah (yeah, that's it)
                    </p>

                    <p class="post-time">2022/11/5</p>

                </div>

                <div class="comments-section">

                    <img src="assets/images/default.png" class="icon">

                    <input type="text" class="comment-box" placeholder="Your Opinion">

                    <button class="comment-button">WRITE</button>

                </div>

            </div>

        </div>

        <!-- Design for right column -->

        <div class="right-col">

            <!-- structure for profile card section-->

            <div class="profile_card">

                <div class="profile-pic">

                    <img src="assets/images/default.png">

                </div>

                <div>

                    <p class="username">EventsWave Official</p>

                    <p class="sub-text">Events with Elegance</p>

                </div>

                <button class="logout-btn">LogOut</button>

            </div>

            <!-- structure for suggestions -->

            <p class="suggesting">Recommendation For You</p>

            <div class="suggestion_card">

                <div class="suggestions-pic">

                    <img src="assets/images/profile_2.jpg">

                </div>

                <div>

                    <p class="username">Naruto_Uz890</p>

                    <p class="sub-text">Naruto Uzumaki</p>

                </div>

                <button class="fallow-btn">Fallow</button>

            </div>

            <div class="suggestion_card">

                <div class="suggestions-pic">

                    <img src="assets/images/profile_2.jpg">

                </div>

                <div>

                    <p class="username">Naruto_Uz890</p>

                    <p class="sub-text">Naruto Uzumaki</p>

                </div>

                <button class="fallow-btn">Fallow</button>

            </div>

            <div class="suggestion_card">

                <div class="suggestions-pic">

                    <img src="assets/images/profile_2.jpg">

                </div>

                <div>

                    <p class="username">Naruto_Uz890</p>

                    <p class="sub-text">Naruto Uzumaki</p>

                </div>

                <button class="fallow-btn">Fallow</button>

            </div>

            <div class="suggestion_card">

                <div class="suggestions-pic">

                    <img src="assets/images/profile_2.jpg">

                </div>

                <div>

                    <p class="username">Naruto_Uz890</p>

                    <p class="sub-text">Naruto Uzumaki</p>

                </div>

                <button class="fallow-btn">Fallow</button>

            </div>

        </div>

    </div>

</section>



</body>

</html>