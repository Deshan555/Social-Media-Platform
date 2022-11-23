<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="assets/css/section.css">

  <link rel="stylesheet" href="assets/css/posting.css">

  <link rel="stylesheet" href="assets/css/right_col.css">

  <link rel="stylesheet" href="assets/css/responsive.css">

  <link rel="stylesheet" href="assets/css/camara-upload.css">

  <link rel="stylesheet" href="assets/css/links.css">

</head>

<body>

<nav class="navbar">

  <div class="nav-wrapper">

    <img src="assets/images/black_logo.png" class="brand-img">

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

<br><br><br>

<!-- Using Bootstrap Grid System -->

<div class="container">

  <div class="row">

    <div class="col">

      <div class="mb-5">

        <form action="video_uploader.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">

              <h1 class="profile-user-name" style="font-size: 2rem;font-weight: 300;">Publish Your Short Video</h1>

          </div><br>

          <div class="form-group">

            <label for="caption">What On Your Mind</label>

            <input type="text" class="form-control" id="caption" aria-describedby="caption-area" placeholder="caption here" onchange="get_caption();" name="caption">

          </div><br>

          <div class="form-group">

            <label for="tag-id">Hash Tags</label>

            <input type="text" class="form-control" id="tag-id" aria-describedby="caption-area" placeholder="Hash Tags" onchange="get_hash();" name="hash-tags">

          </div><br>

          <div class="form-group">

            <label for="tag-id">Add video</label>

            <input class="form-control" type="file" id="file" name="file" onchange="preview()">

          </div>

          <br>

          <div class="form-group">

            <input type="submit" class="btn btn-primary" name="posting" value="Publish Video">

            <button onclick="clearImage()" class="btn btn-primary">Clear Preview</button>

          </div>

        </form>

      </div>

    </div>

    <div class="col d-none d-lg-block">

      <h1 class="profile-user-name" style="font-size: 2rem;font-weight: 300;">Preview Post</h1><br>

      <?php if(isset($_GET['error_message'])){ ?>
        
        <p id="error_message" class="text-center alert-danger mt-3"><?php echo $_GET['error_message'];?></p>
        
      <?php }?>

      <?php if(isset($_GET['success_message'])){ ?>
        
        <p class="text-center alert alert-success mt-3"><?php echo $_GET['success_message'];?></p>
        
      <?php }?>

      <div class="post">

        <div class="info">

          <div class="user">

            <div class="profile-pic"><img src="assets/images/temp_profile.webp"></div>

            <p class="username">Preview Post</p>

          </div>

          <i class="fas fa-ellipsis-v options"></i>

        </div>

        <div class="ratio ratio-4x3">

          <iframe src="" id="frame" title="YouTube video" allowfullscreen></iframe>

        </div>

        <div class="post-content">

          <div class="reactions-wrapper">

            <i class="icon fas fa-thumbs-up"></i>

            <i class="icon fas fa-comment"></i>

          </div>

          <p class="description" id="caption-data">

            <span>Caption : <br></span>

            Description is a spoken or written account of a person, object, or event. It can also mean a type or class of people or things. Discription is not a word.

          </p>

          <p class="post-time" id="current-date">2022/11/5</p>

          <p class="post-time" id="hash-tags" style="color: #3942e7;"><i>#hashtag #hashtags</i></p>

        </div>

      </div>

    </div>

</div>

</div>

<script src="assets/js/preview-helper.js"> </script>

</body>

</html>