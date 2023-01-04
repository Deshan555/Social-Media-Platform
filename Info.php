<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">

  <title>EventsWave</title>

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

  <link rel="stylesheet" href="assets/css/discover.css">

  <link rel="stylesheet" href="assets/css/results.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

<!-- Nav Bar Design -->

<nav class="navbar">

  <div class="nav-wrapper">

    <img src="assets/images/black_logo.png" class="brand-img" id="logo-img">

    <div class="nav-items">

        <a href="Events.php" style="text-decoration: none; color: #1c1f23"><i class="icon fas fa-flag fa-lg"></i></a>

        <a href="shorts.php" style="text-decoration: none; color: #1c1f23"><i class="icon fas fa-video fa-lg"></i></a>

        <div class="icon user-profile">

            <a href="my_Profile.php" ><i class="fas fa-user-circle fa-lg"></i></a>

        </div>
    </div>

  </div>

</nav>

<!-- design photo gallery -->



<main>

  <div class="discover-container">

    <div class="gallery">
      <div class="container mt-3">
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills nav-justified" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#home">Followings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#menu1">Followers</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>

              <ul class="list-group">

                  <?php

                  include('Results_Provider.php');

                  include('get_dataById.php');

                  $users = get_My_Followings();

                  foreach($users as $members){

                      $extract_data = get_UserData($members['Other_user_id']);?>

                      <div class="result-section">

                          <li class="list-group-item search-result-item">

                              <img src="<?php echo "assets/images/profiles/".$extract_data[2]; ?>" alt="profile-image">

                              <div class="profile_card" style="margin-left: 20px;">

                                  <div>
                                      <p class="username" style="font-weight: bold;"><?php echo $extract_data[1]; ?></p>

                                      <p class="sub-text"><?php echo $extract_data['0']; ?></p>

                                  </div>

                              </div>

                              <div class="search-result-item-button">

                                  <form method="post" action="follower_acc.php">
                                      <input type="hidden" value="<?php echo $members['Other_user_id']?>" name="target_id">

                                      <button type="submit" class="btn btn-outline-primary">Visit Profile</button>
                                  </form>

                              </div>

                          </li><br>

                      </div>

                  <?php }?>
              </ul>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>

              <ul class="list-group">

                  <?php

                  $users = get_My_Followers();

                  foreach($users as $members){

                      $extract_data = get_UserData($members['Other_user_id']);?>

                      <div class="result-section">

                          <li class="list-group-item search-result-item">

                              <img src="<?php echo "assets/images/profiles/".$extract_data[2]; ?>" alt="profile-image">

                              <div class="profile_card" style="margin-left: 20px;">

                                  <div>
                                      <h6 class="username" style="font-weight: bold;"><?php echo$extract_data[1];?></h6>

                                      <p class="sub-text"><?php echo $extract_data[0]; ?></p>

                                  </div>

                              </div>

                              <div class="search-result-item-button">

                                  <form method="post" action="follower_acc.php">
                                      <input type="hidden" value="<?php echo $members['Other_user_id']?>" name="target_id">

                                      <button type="submit" class="btn btn-outline-primary">Visit Profile</button>
                                  </form>

                              </div>

                          </li><br>

                      </div>

                  <?php }?>
              </ul>
          </div>
        </div>
      </div>

    </div>

  </div>


</main>

</body>

<script type="text/javascript">
    document.getElementById("logo-img").onclick = function () {
        location.href = "home.php";
    };
</script>

</html>