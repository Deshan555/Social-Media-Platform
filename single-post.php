<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Title</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>-->

    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/section.css">

    <link rel="stylesheet" href="assets/css/posting.css">

    <link rel="stylesheet" href="assets/css/right_col.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/Comment.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

<!-- Nav Bar Design -->

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

</nav>

<!-- New Section -->

<?php

include('config.php');

if(isset($_GET['post_id']))
{

    $post_identification = $_GET['post_id'];

    $stmt = $conn->prepare("SELECT * FROM Posts WHERE Post_ID = $post_identification;");

    $stmt->execute();

    $post_array = $stmt->get_result();

}
else{
    header('location: home.php');

    exit;
}

if(isset($_GET['page_no']) && $_GET['page_no'] != "")
{
    $page_no = $_GET['page_no'];
}else
{
    $page_no = 1;
}

$sql = "SELECT COUNT(*) as total_comments FROM comments WHERE POST_ID = $post_identification";

$stmt = $conn->prepare($sql);

$stmt->execute();

$total_comments =0;

$stmt->bind_result($total_comments);

$stmt->store_result();

$stmt->fetch();

$total_comments_per_page = 2;

$offest = ($page_no - 1) * $total_comments_per_page;

// that php ceil function return rounded numbers

$total_number_pages = ceil($total_comments/$total_comments_per_page);

$stmt = $conn->prepare("SELECT * FROM comments WHERE POST_ID = $post_identification LIMIT $offest, $total_comments_per_page;");

$stmt->execute();

$comments = $stmt->get_result();
?>

<section class="main">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col">

            <?php if(isset($_GET['error_message'])){ ?>

                <p id="error_message" class="text-center alert-danger mt-3"><?php echo $_GET['error_message'];?></p>

            <?php }?>

            <?php if(isset($_GET['success_message'])){ ?>

                <p class="text-center alert alert-success mt-3"><?php echo $_GET['success_message'];?></p>

            <?php }?>

            <!-- Wrapper for single posting -->

            <?php foreach($post_array as $post){ ?>

                <div class="post">

                    <div class="info">

                        <div class="user">

                            <div class="profile-pic"><img src="<?php echo "assets/images/posts/". $post['Profile_Img']; ?>"></div>

                            <p class="username"><?php echo $post['USER_NAME'];?></p>

                        </div>

                        <?php

                        session_start();

                        $id = $_SESSION['id'];

                        if($post['User_ID'] == $id){?>

                        <i class="fas fa-ellipsis-v options" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>

                        <?php }?>

                    </div>

                    <img src="<?php echo "assets/images/posts/". $post['Img_Path']; ?>" class="post-img">

                    <div class="post-content">

                        <div class="reactions-wrapper">

                            <i class="icon fas fa-thumbs-up"></i>

                            <i class="icon fas fa-calendar-alt"></i>

                        </div>

                        <p class="reactions"><?php echo $post['Likes'];?> Reactions</p>

                        <p class="description">

                            <span><?php echo $post['USER_NAME'];?> Says :<br></span>

                            <?php echo $post['Caption'];?>
                        </p>

                        <p class="post-time"><?php echo date("M,Y,d", strtotime($post['Date_Upload']));?></p>

                    </div>

                </div>

            <?php }?>

            <div class="col-md-12 col-lg-10 col-xl-8 mt-2 mb-2" style="width: 100%; ">

                <div class="card" style="border-radius: 10px; background: #F5F5F5;">

                    <div class="card-body">

                        <div class="d-flex flex-start align-items-center">

                            <div class="comments-section">

                                <img src="<?php echo 'assets/images/profiles/'.$_SESSION['img_path']?>" class="icon" style="width: 40px; height: 40px;">

                                <form method="post" action="comments_action.php" class="comments-section">

                                    <input type="text" class="comment-box" placeholder="Your Opinion" name="comment">

                                    <input type="hidden" name="post_id" value="<?php echo $post['Post_ID']?>">

                                    <button class="comment-button" type="submit" name="submit"><i class="fa-regular fa-paper-plane fa-lg"></i></button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div><br>

                <!-- Modal For Post Options-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Post Options</h5>
                            </div>
                            <div class="modal-body">

                                <i class="fa-solid fa-trash"></i><a href="" style="color: black;">Delete Post</a><br><br>

                                <i class="fa-solid fa-pen-to-square"></i><a href="" style="color: black;">Edit Post</a>
                            </div>
                        </div>
                    </div>
                </div>

                <p><strong>EventsWave Community Opinion</strong></p>

                <?php

                include 'get_dataById.php';

                foreach($comments as $comment)
                {
                    $data = get_UserData($comment['USER_ID']);

                    ?>

                    <div class="card mb-2" style="border-radius: 10px; background: #F5F5F5;">

                        <div class="card-body">

                            <p><?php echo $comment['COMMENT']; ?></p>

                            <div class="d-flex justify-content-between">

                                <div class="d-flex flex-row align-items-center">

                                    <img src="<?php echo "assets/images/profiles/" . $data[2]; ?>" alt="avatar" width="30" height="30" style="border-radius: 50%;"/>

                                    <p class="small mb-0 ms-2 pl-3 ml-3">  <?php echo "  ".$data[0]; ?></p>

                                </div>
                                <div class="d-flex flex-row align-items-center text-primary">

                                    <p class="text-muted small mb-0"><?php echo $comment['DATE']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

                <!--Pagination bar-->
                <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">

                    <ul class="pagination">

                        <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">

                            <a class="page-link" href="<?php if($page_no<=1){echo'#';}else{ echo 'single-post.php?post_id='.$post_identification.'&page_no='. ($page_no-1); }?>"><</a>

                        </li>

                        <li class="page-item <?php if($page_no>= $total_number_pages){echo 'disabled';}?>">

                            <a class="page-link" href="<?php if($page_no>=$total_number_pages){echo "#";}else{ echo 'single-post.php?post_id='.$post_identification.'&page_no='.($page_no+1);}?>">></a>

                        </li>
                    </ul>
                </nav>

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

        </div>

    </div>

</section>



</body>

</html>