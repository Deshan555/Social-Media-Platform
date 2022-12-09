
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

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/right_col.css">
    
    <link rel="stylesheet" href="assets/css/profile-page.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        .style-wrapper{
            
            width: 90%;
            
            height: 70px;
            
            background:  #F5F5F5;
            
            border: 1px solid #fdfdfd;
            
            padding: 10px;
            
            padding-right: 0;

            display: flex;
            
            align-items: center;
            
            overflow: hidden;
                        
            border-radius: 10px;
        }

        .Events-wrapper{
            
            width: 90%;
            
            height: 200px;
            
            background:  #F5F5F5;
            
            border: 1px solid #fdfdfd;
            
            padding: 10px;
            
            padding-right: 0;

            display: flex;
            
            align-items: center;
            
            overflow: hidden;
            
            overflow-x: auto;
            
            border-radius: 10px;

        }

    </style>
</head>

<body>

<!-- Nav Bar Design -->

  <nav class="navbar">

      <div class="nav-wrapper">

          <img src="assets/images/black_logo.png" class="brand-img">

          <div class="nav-items">

              <i class="icon fas fa-home fa-lg"></i>

              <i class="icon fa-solid fa-magnifying-glass fa-lg" data-bs-toggle="modal" data-bs-target="#search-model"></i>

              <i class="icon fas fa-flag fa-lg"></i>

              <i class="icon fas fa-video fa-lg"></i>

              <i class="icon fas fa-plus-square fa-lg" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>

              <i class="icon fas fa-calendar-alt fa-lg"></i>

              <div class="icon user-profile">

                  <a href="my_Profile.php" ><i class="fas fa-user-circle fa-lg"></i></a>

              </div>

          </div>

      </div>

  </nav>



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="modal-dialog">
        
        <div class="modal-content">
            
            <div class="modal-header">
                
                <!--<h5 class="modal-title" id="exampleModalLabel">Post Short Video</h5>-->

                <h3 class="profile-user-name modal-title" style="font-size: 2rem;font-weight: 200;">Publish Your Short Videos</h3>
            
            </div>

            <div class="model-body">
                
                <ul style="list-style: none; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 10px; text-decoration: none;">
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-cog"></i></button><a href="edit-profile.php">Profile Edit<a></li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-calendar-week"></i></i></button><a href="">Post About New Event</a></li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-pen" data-bs-toggle="modal" data-bs-target="#post_model"></i></i></button>Create New Post</a></li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-video" data-bs-toggle="modal" data-bs-target="#video_model"></i></i></button>Publish New Short video</li>
                    <li><button class="profile-button profile-settings-btn"><i class="icon fas fa-sign-out-alt"></i></i></button><a href="logout.php">Log Out</a></li>
                </ul>

            </div>
        </div>
    </div>
  </div>

<!-- New Section -->


<section class="main">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col">

            <!-- Wrapper For Status -->

            <?php include('Clubs.php');?>

            <!-- Wrapper for posting -->

            <?php include('get_latest_posts.php'); ?>

            <?php

            include('get_dataById.php');

            foreach($posts as $post)
            {
                $data = get_UserData($post['User_ID']);

                $profile_img = $data[2];

                $profile_name = $data[0];

                ?>

            <div class="post">

                <div class="info">

                    <div class="user">

                        <div class="profile-pic"><img src="<?php echo "assets/images/profiles/". $profile_img; ?>"></div>

                        <p class="username"><?php echo $profile_name;?></p>

                    </div>

                    <?php

                    $id = $_SESSION['id'];

                    if($post['User_ID'] == $id){?>

                        <i class="fas fa-ellipsis-v options" data-bs-toggle="modal" data-bs-target="#post-model"></i>

                    <?php }?>

                    <!--<i class="fas fa-ellipsis-v options"></i>-->

                </div>

                <img src="<?php echo "assets/images/posts/". $post['Img_Path']; ?>" class="post-img">

                <div class="post-content">
                    
                    <div class="reactions-wrapper">

                        <?php include('check_like_status.php');?>

                        <?php if($reaction_status){?>

                        <form action="unlike.php" method="post">
                            <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_id">
                            <button style="background: none; border: none;" type="submit" name="reaction">
                                <i style="color: #fb3958;" class="icon fas fa-heart fa-lg"></i>
                            </button>
                        </form>

                        <?php } else{?>

                            <form action="like.php" method="post">
                                <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_id">
                                <button style="background: none; border: none;" type="submit" name="reaction">
                                    <i style="color: #22262A;" class="icon fas fa-heart fa-lg"></i>
                                </button>
                            </form>

                        <?php }?>

                        <a href="single-post.php?post_id= <?php echo $post["Post_ID"];?>" style="color: #22262A;"><i class="icon fas fa-comment fa-lg"></i></a>

                        <a href="#" style="color: #22262A;"><i class="icon fas fa-calendar-alt fa-lg"></i></a>

                </div>

                    <p class="reactions"><?php echo $post['Likes'];?> Reactions</p>

                    <p class="description">
                        <span><?php echo $profile_name;?> Says :<br></span>

                        <?php echo $post['Caption'];?>
                    </p>

                    <p class="post-time"><?php echo date("M,Y,d", strtotime($post['Date_Upload']));?></p>

                    <p class="post-time"><?php echo $post['HashTags'];?></p>

                </div>

            </div>

            <?php } ?>

            <!-- Modal For Post Options-->
            <div class="modal fade" id="post-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Post Options</h5>
                        </div>
                        <div class="modal-body">

                            <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Edit Post</a><br><br>

                            <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#delete_model" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Delete Post</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- actions for opinions -->

            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="Edit-Post-1.php">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Hash Tags</label>
                                    <input type="text" class="form-control" id="recipient-name" name="hash-tag" value="<?php echo $post['HashTags'];?>" maxlength="20">
                                </div>

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Caption</label>
                                    <textarea class="form-control" id="message-text" maxlength="500" name="caption"><?php echo $post['Caption'];?></textarea>
                                </div>

                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">
                                <button type="submit" class="btn btn-outline-primary" name="edit">Edit Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
            <!--Pagination bar-->
            <nav aria-label="Page navigation example" class="mx-auto mt-3">

            <ul class="pagination">
                        
                <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">
                             
                    <a class="page-link" href="<?php if($page_no<=1){echo'#';}else{ echo '?page_no='. ($page_no-1); }?>">Previous</a>
                        
                        </li>
                            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                        
                            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
                        
                            <li class="page-item"><a class="page-link" href="?page_no=3">3</a></li>
                       <?php if($page_no >= 3){?>
                        
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        
                        <li class="page-item"><a class="page-link" href="<?php echo "?page_no=". $page_no;?>"></a></li>
                        
                        <?php } ?>
                        
                        <li class="page-item <?php if($page_no>= $total_number_pages){echo 'disabled';}?>">
                        
                    <a class="page-link" href="<?php if($page_no>=$total_number_pages){echo "#";}else{ echo "?page_no=".($page_no+1);}?>">Next</a>
                        
                </li>
            </ul>
            </nav>
        
        </div>

        <!-- Design for right column -->

        <div class="right-col">

            <!-- structure for profile card section-->

            <div class="style-wrapper mt-2" style="background: white;">
                    
                    <div class="suggestion_card">
                        
                        <div>
                            <img src="<?php echo "assets/images/profiles/".$_SESSION['img_path'];?>" style="border-radius: 50%; width: 60px; height: 60px; vertical-align: middle; float: left; margin-top: 6px;">
                        </div>

                        <div>
                            <p class="username" style="margin-left: 11px;"><?php echo $_SESSION['username'];?></p>

                            <p class="sub-text" style="margin-left: 19px;"><?php echo $_SESSION['fullname'];?></p>

                        </div>

                        <a href="logout.php"><button class="fallow-btn" style="margin-left: 60px;">LOG OUT</button></a>               

                    </div>
                
            </div>

            <!-- structure for suggestions -->

            <p class="suggesting">Recommendation For You</p>

            <?php include("get_suggestions.php"); ?>

            <?php foreach($suggestions as $suggestion){?>

                <?php if($suggestion['User_ID']!= $_SESSION['id']){?>
                
                <div class="style-wrapper mt-2">
                    
                    <div class="suggestion_card">
                        
                        <div>
                            <form id="suggestion_form<?php echo $suggestion['User_ID'];?>" method="post" action="follower_acc.php">

                                <input type="hidden" value="<?php echo $suggestion['User_ID']?>" name="target_id">

                                <img src="<?php echo "assets/images/profiles/".$suggestion['IMAGE'];?>" style="border-radius: 50%; width: 45px; height: 45px; vertical-align: middle; float: left; margin-top: 6px;" onclick="document.getElementById('suggestion_form'+<?php echo $suggestion['User_ID'];?>).submit();">

                            </form>
                        </div>

                        <div>
                            <p class="username" style="margin-left: 0px;"><?php echo $suggestion['USER_NAME'];?></p>

                            <p class="sub-text" style="margin-left: 19px;"><?php echo $suggestion['FULL_NAME'];?></p>

                        </div>

                        <form method="POST" action="fallow_user.php">
                            
                            <input type="hidden" name="fallow_person" value='<?php echo $suggestion['User_ID'];?>'>
                            
                            <button type="submit" class="fallow-btn" style="margin-left: 60px;" name="fallow">Fallow</button>
                        
                        </form>
                        
                    </div>
                
                </div>

                <?php } ?>

            <?php }?>

            <p class="suggesting">Upcoming Events</p>

            <div class="card" style="width: 90%; border-radius: 10px; background: #F5F5F5; border: 1px solid #fdfdfd;">
            
            <img src="assets/images/pp3.jpg" class="card-img-top" alt="Event_Card" style="border-radius: 10px;">
            
            <div class="card-body">
                
                <h6 class="card-title">Card title</h6>
                
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                
                <button class="fallow-btn">See All</button>
            </div>

        </div>

    </div>

</section>


<!-- Search Modal -->
<div class="modal fade" id="search-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <form method="post" action="Results.php">
                        <input type="search" name="find" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    </form>
            </div>
        </div>
    </div>
</div>

<!-- model for video upload -->

<div class="modal fade" id="video_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-fullscreen">
        
        <div class="modal-content">
            
            <div class="modal-header">
                
                <h3 class="profile-user-name modal-title" style="font-size: 2rem;font-weight: 200;">Publish Your Short Video</h3>
            
            </div>
            
            <div class="modal-body">

            <div class="container">

                <div class="row">
              
                  <div class="col">
              
                    <div class="mb-5">
              
                      <form action="video_uploader.php" method="post">
                            
                        
                      <div class="form-group">
              
                          <label for="caption">What On Your Mind</label>
              
                          <input type="text" class="form-control" id="caption" aria-describedby="caption-area" placeholder="caption here" onchange="get_caption();" name="caption">
              
                        </div><br>
              

              
                        <div class="form-group">
              
                          <label for="tag-id">Hash Tags</label>
              
                          <input type="text" class="form-control" id="tag-id" aria-describedby="caption-area" placeholder="Hash Tags" onchange="get_hash();" name="hash-tags">
              
                        </div><br>
              
                        <div class="form-group">
              
                          <label for="tag-id">Add Video</label>
              
                          <input class="form-control" type="file" id="formFile" onchange="preview()" required name="video_file">
              
                        </div><br>

                        
                        <div class="form-group">
              
                          <label for="tag-id">Add Thumbnail</label>
              
                          <input class="form-control pt-2" type="file" id="Thumbnail" required name="thumbnail">
              
                        </div>
              
                        <br>
              
                        <div class="form-group">
              
                          <button type="submit" class="btn btn-primary" name="posting">Post Video</button>
              
                          <button onclick="clearImage()" class="btn btn-primary">Clear Preview</button>
              
                        </div>
              
                      </form>
              
                    </div>
              
                  </div>
              
                  <div class="col d-none d-lg-block">

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
                            
                      <div class="ratio ratio-4x3 post-source border-5">
              
                        <iframe src="" id="frame" title="YouTube video" allowfullscreen  poster="assets/images/no-photo.png"></iframe>
              
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
              
                        <p class="description" id="caption-event">
                                          
                        <p class="post-time" id="hash-tags" style="color: #3942e7;"><i>#hashtag #hashtags</i></p>
              
                      </div>
              
                    </div>
              
                  </div>
              
              </div>
              
              </div>
                           
              <script src="assets/js/preview-helper.js"> </script>

        </div>
        
        <div class="modal-footer">
  
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  
        </div>

      </div>

    </div>

  </div>

</body>

</html>