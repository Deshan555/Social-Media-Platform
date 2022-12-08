<!DOCTYPE html>

<html lang="en">

<head>

  <title>Bootstrap Example</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="assets/css/profile-page.css">

  <link rel="stylesheet" href="assets/css/section.css">

  <link rel="stylesheet" href="assets/css/posting.css">

  <link rel="stylesheet" href="assets/css/right_col.css">

  <link rel="stylesheet" href="assets/css/responsive.css">

  <link rel="stylesheet" href="assets/css/discover.css">

  <link rel="stylesheet" href="assets/css/results.css">

</head>

<body>

<div class="container">

  <nav class="navbar">

    <div class="nav-wrapper">

      <img src="assets/images/black_logo.png" class="brand-img">

      <div class="nav-items">

        <i class="icon fas fa-home fa-lg"></i>

        <i class="icon fas fa-plus-square fa-lg"></i>

        <i class="icon fas fa-heart fa-lg"></i>

        <div class="icon user-profile">

          <i class="fas fa-user-circle fa-lg"></i>

        </div>

      </div>

    </div>

    <?php

include('config.php');


if(isset($_POST['find'])){

    $search_input = $_POST['find'];

    $SQL = "SELECT * FROM posts WHERE Caption LIKE '%$search_input%' OR HashTags LIKE '%$search_input%';";

    $stmt = $conn->prepare($SQL);

    $stmt->execute();

    $posts = $stmt->get_result();
    }
    else
    {
    $search_input = "car";

    $stmt = $conn->prepare("SELECT * FROM posts WHERE Caption like ? OR HashTags like ? limit 12");

    $stmt->bind_param("ss",strval("%".$search_input."%"),strval("%".$search_input."%"));

    $stmt->execute();

    $posts = $stmt->get_result();
    }
    ?>

  </nav><br><br><br>

    <h3>h3 heading <small>secondary text</small></h3>

    <p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>

    <ul class="nav nav-pills">

        <li class="active"><a data-toggle="pill" href="#home">Home</a></li>

        <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>

        <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>

        <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>

    </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

      <main>

      <?php foreach($posts as $post){ ?>

          <div class="discover-container">

          <div class="gallery">

            <div class="gallery-items">

              <img src="<?php echo "assets/images/posts/".$post['Img_Path'];?>" alt="post" class="gallery-img">

              <div class="gallery-item-info">

                <ul>

                  <li class="gallery-items-likes"><span class="hide-gallery-elements"><?php echo $post['Likes']; ?></span>

                    <i class="icon fas fa-thumbs-up"></i>

                  </li>

                  <li class="gallery-items-comments"><span class="hide-gallery-elements">Opinions : </span>

                    <i class="icon fas fa-comment"></i>

                  </li>

                </ul>

              </div>

            </div>

          </div>

          </div>

      <?php }?>

      </main>

    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>

        <ul class="list-group">

            <?php

            include('Results_Provider.php');

            $users = find_Users($search_input);

            foreach($users as $members){?>

            <div class="result-section">

                <li class="list-group-item search-result-item">

                    <img src="<?php echo "assets/images/profiles/".$members['IMAGE']; ?>" alt="profile-image">

                    <div class="profile_card" style="margin-left: 20px;">

                        <div>
                            <p class="username"><?php echo $members['FULL_NAME']; ?></p>

                            <p class="sub-text"><?php echo $members['USER_NAME']; ?></p>
                        </div>

                    </div>

                    <div class="search-result-item-button">

                        <form method="post" action="follower_acc.php">
                            <input type="hidden" value="<?php echo $members['User_ID']?>" name="target_id">

                            <button type="submit" class="btn btn-outline-primary">Visit Profile</button>
                        </form>

                    </div>

                </li><br>

            </div>

            <?php }?>
        </ul>

    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

</body>
</html>
