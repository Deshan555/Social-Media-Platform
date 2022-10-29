<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="assets/rebuild/css/bootstrap-login-form.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    
    <title>Login</title>
</head>

<body>
        <section class="vh-100" style="background-image: url('assets/images/cover.png');">

            <div class="container py-5 h-100">

              <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col col-xl-10">

                  <div class="card" style="border-radius: 1rem;">

                    <div class="row g-0">

                      <div class="col-md-6 col-lg-5 d-none d-md-block">

                        <img
                          src="assets/images/main_img.jpg"
                          alt="login form"
                          class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                        />

                      </div>

                      <div class="col-md-6 col-lg-7 d-flex align-items-center">

                                  
                      <div class="d-flex justify-content-center">
                
                <form method="post" action="assets/php/actions.php?login">
                
                  </div>
                        
                        <div class="card-body p-4 p-lg-5 text-black">

                            <img class="mb-5 pl-3" src="assets/images/small_logo.png" alt="" height="45">
                                
                            <h6 style="text-transform: uppercase; color: grey;" class="mt-2 mb-1"><b>Join With Us</b></h5>
                
                                <div class="form-floating mb-2 pt-1 text-muted h6" style="font-size:small;">

                                    <input type="text" name="username_email" value="<?=showFormData('username_email')?>" class="form-control form-control-lg0" placeholder="username/email">

                                    <label for="floatingInput">USERNAME/E-MAIL</label>

                                </div>
                                
                                <?=showError('username_email')?>
                                
                                <div class="form-floating mb-2 text-muted h6" style="font-size:small;">

                                    <input type="password" name="password" class="form-control form-control-lg0" id="floatingPassword" placeholder="Password">

                                    <label for="floatingPassword">PASSWORD</label>

                                </div>
                                
                                <?=showError('password')?>
                                
                                <?=showError('checkuser')?>
                
                                <div class="pt-1 mb-4">

                                  <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>

                                </div>

                                <a class="small text-muted" href="?forgotpassword&newfp">Forgot password?</a>
                    
                                <p class="mb-5 pb-lg-2" style="color: #19afd4;">Don't have an account? <a href="?signup" style="color: #2696ca;">Register here</a></p>
                    
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
 

        <script src="assets/rebuild/js/mdb.min.js"></script>
</body>

</html>
