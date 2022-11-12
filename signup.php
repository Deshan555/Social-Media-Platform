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
                
                <img src="assets/images/login_request/signup_img.jpg"alt="login form"class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>

              </div>

              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="post" id="signup_form" action="signup_action.php">

                <div class="d-flex justify-content-center">

                    <img class="mb-4" src="assets/images/login_request/small_logo.png" alt="" height="45">

                </div>

                <h6 style="text-transform: uppercase; color: grey;" class="mt-2 mb-1"><b>Join With Us</b></h6>

                <?php if(isset($_GET['error_message'])){ ?>

                  <p id="error_message" class="text-center alert-danger"><?php echo $_GET['error_message'];?></p>

                <?php }?>

                

                <div class="d-flex">

                    <div class="form-floating mt-1 col-6 text-muted h6" style="font-size:small;">

                        <input type="text" name="full_name" class="form-control form-control-lg0" placeholder="username/email">

                        <label for="floatingInput">Full Name</label>

                    </div>

                    <div class="form-floating mt-1 col-6 text-muted h6" style="font-size:small;">

                        <input type="text" name="user_name" class="form-control form-control-lg0" placeholder="username/email">

                        <label for="floatingInput">User Name</label>

                    </div>

                </div>

                <div class="form-floating mt-2 text-muted h6" style="font-size:small;">

                    <input type="email" name="email" class="form-control form-control-lg0" placeholder="username/email">
                    
                    <label for="floatingInput">email</label>

                </div>

                <div class="form-floating mt-2 text-muted h6" style="font-size:small;">

                    <input type="password" name="password" class="form-control form-control-lg0" placeholder="Password" id="pass" onchange="verify_len();">

                    <label for="floatingInput">Password</label>

                </div>

                <div class="form-floating mt-2 text-muted h6" style="font-size:small;">

                    <input type="password" name="retype_password" class="form-control form-control-lg0" id="retype_pass" placeholder="Retype Password" onchange="verify_form();">

                    <label for="floatingPassword">Retype password</label>

                </div>

                <div class="pt-1 mb-4 mt-2">

                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="signup_btn">SIGNUP</button>

                </div>

                <p class="mb-4 pb-lg-2" style="color: #19afd4;">Have an account? <a href="assets/pages/signup.php" style="color: #2696ca;">

                SignIn</a></p>

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

  <script type="text/javascript">

    /*function verify_form()
    {
      var password = document.getElementById('pass').value;

      var retype_password = document.getElementById('retype_pass').value;

      if(password !== retype_password)
      {
        document.getElementById("error_message").innerHTML = "Password Not Match";

        console.log('password missmatch');

        return false;
      }
      else{
        return true;
      }
    }*/


    function verify_len()
    {
      var password = document.getElementById('pass').value;

      if(password.length <= 8)
      {
        document.getElementById("error_message").innerHTML = 'password too short';
      }
      else{
        document.getElementById("error_message").innerHTML = '';
      }
    }

    /*document.getElementById('signup_btn').addEventListener('click'),(e)=>
    {
      e.preventDefault();

      verify_form();
    }*/

  </script>

</body>

</html>