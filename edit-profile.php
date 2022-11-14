
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

  <link rel="stylesheet" href="assets/css/responsive.css">

  <link rel="stylesheet" href="assets/css/edit-profile.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>



<body>

<nav class="navbar">

  <div class="nav-wrapper">

    <img src="assets/images/black_logo.png" class="brand-img">

    <div class="nav-items">

      <i class="icon fas fa-home fa-lg"></i>

      <i class="icon fas fa-cog fa-lg"></i>

      <div class="icon user-profile">

        <i class="fas fa-user-circle fa-lg"></i>

      </div>

    </div>

  </div>

</nav>

<br><br><br>

<!-- Profile edit Section - Preview Section -->

<div class="container">

  <div class="row gutters">

    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

      <div class="card h-100">

        <div class="card-body">

          <div class="account-settings">

            <div class="user-profile-edit">

              <div class="user-avatar">

                <img src="<?php echo $_SESSION['img_path'] ?>" alt="profile-avatar">

              </div>

              <h5 class="user-name"><?php echo $_SESSION['username']; ?></h5>

              <h6 class="user-email"><?php echo $_SESSION['fullname']?></h6>

            </div>

            <div class="about">

              <h5>Bio</h5>

              <p><?php echo $_SESSION['bio']?></p>

            </div>

            <?php if(isset($_GET['error_message'])){ ?>
                  
              <p id="error_message" class="text-center alert-danger"><?php echo $_GET['error_message'];?></p>
                  
            <?php }?>

          </div>

        </div>

      </div>

    </div>

<!-- Profile edit Section - Edit Section -->

    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

      <div class="card h-100">

<form method="POST" action="update-profile.php" enctype="multipart/form-data">
      <div class="card-body">

<div class="row gutters">

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    <h6 class="mb-2 text-primary">Personal/Organization Details</h6>

  </div>

  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="fullName">Full Name</label>

      <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter full name/Organization Name">

    </div>

  </div>


  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="user_name">User Name</label>

      <input type="text" class="form-control" id="user_name" placeholder="Enter User Name" name="user_name">

    </div>

  </div>


  <div class="form-group">

      <label for="formFile" style="padding-top: 5px;">Change Display Picture</label>

      <input class="form-control" type="file" id="formFile" name="image">

  </div>


  <div class="mb-3">

    <label for="exampleFormControlTextarea1" class="form-label" style="padding-top: 5px;">Describe Your Self</label>

    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="little bit about you" name="bio"></textarea>

  </div>

  <div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

      <h6 class="mt-3 mb-2 text-primary">Social</h6>

  </div>


  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="email">Email Address</label>

      <input type="email" class="form-control" id="email" placeholder="Enter email address" name="email">

    </div>

  </div>

  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="whatsapp" style="padding-top: 5px;">WhatsApp</label>

      <input type="text" class="form-control" id="whatsapp" placeholder="Enter WhatsApp Link" name="wapp" value="sdfs">

    </div>

  </div>


  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="facebook" style="padding-top: 5px;">Facebook</label>

      <input type="text" class="form-control" id="facebook" placeholder="Enter Facebook Link" name="fbook">

    </div>

  </div>

</div>


<div class="row gutters">

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

    <h6 class="mt-3 mb-2 text-primary"><br>Account Security - Change Password</h6>

  </div>


  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="current-password">Current Password</label>

      <input type="password" class="form-control" id="current-password" placeholder="Enter current-password" name="cpass">

    </div>

  </div>


  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="new-password">New Password</label>

      <input type="password" class="form-control" id="new-password" placeholder="Enter new-password" name="npass">

    </div>

  </div>


  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

    <div class="form-group">

      <label for="retype-password" style="padding-top: 5px;">Retype New Password</label>

      <input type="password" class="form-control" id="retype-password" placeholder="Enter retype-password" name="ccpass">

    </div>

  </div>

</div>

  <div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

      <div class="text-right">

        <br><button type="submit" id="cancel" name="submits" class="btn btn-secondary">Cancel</button>

        <button type="submit" id="submit-data" name="submit" class="btn btn-primary">Update</button>

      </div>

    </div>

  </div>

</div>

</div>
      </form>
      
      </div>

    </div>

  </div>

</div>

</body>

</html>