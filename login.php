<?php
session_start();

if (isset($_SESSION['id'])) {
  header('location: index.php');
  exit;
}

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>EventsWave</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-login-form.min.css" />
</head>

<body>
  <section class="vh-100" style="background-image: url('assets/images/login_request/cover.png');">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="assets/images/login_request/main_img.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form method="post" action="login_action.php">
                    <img src="assets/images/login_request/small_logo.png" height="40px" width="auto"> <br><br>
                    <h5 class="fw-normal mb-3 pb-3" style="text-transform: uppercase; color: grey;"><b>Sign in with your SLTC ID</b></h5>

                    <?php if (isset($_GET['error_message'])) { ?>
                      <!-- Escape the error message to prevent XSS -->
                      <p id="error_message" class="text-center alert-danger"><?php echo htmlspecialchars($_GET['error_message'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php } ?>

                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example17" class="form-control form-control-lg" name="email" required />
                      <label class="form-label" for="form2Example17">Email address/User Name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" required />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <!-- Add hidden CSRF token field -->
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit" name="button">Login</button>
                    </div>

                    <a class="small text-muted" href="Reset-Password.php">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #19afd4;">Don't have an account? <a href="create-account.php" style="color: #2696ca;">Register here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
</body>

</html>