<?php

require 'init.php';

session_regenerate_id(true);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Eventswave</title>

    <link rel="icon" href="assets/images/event_accepted_50px.png" type="image/icon type">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/section.css">

    <link rel="stylesheet" href="assets/css/posting.css">

    <link rel="stylesheet" href="assets/css/right_col.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/Comment.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="notifast/notifast.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <style>
        .style-wrapper{

            width: 90%;

            height: 100px;

            background:  #F5F5F5;

            border: 1px solid #fdfdfd;

            padding: 10px;

            padding-right: 0;

            display: flex;

            align-items: center;

            overflow: hidden;

            border-radius: 10px;
        }
    </style>

</head>

<body>

<?php if(isset($_GET['error_message'])){ ?>

    <?php

    $message = $_GET['error_message'];

    echo"<body onload='notification_function(`Error Message`, `$message`, `#da1857`);'</body>"

    ?>

<?php }?>

<?php if(isset($_GET['success_message'])){ ?>

    <?php

    $message = $_GET['success_message'];

    echo"<body onload='notification_function(`Success Message`, `$message`, `#0F73FA`);'</body>"

    ?>

<?php }?>


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

$total_comments_per_page = 20;

$offest = ($page_no - 1) * $total_comments_per_page;

// that php ceil function return rounded numbers

$total_number_pages = ceil($total_comments/$total_comments_per_page);

$stmt = $conn->prepare("SELECT * FROM comments WHERE POST_ID = $post_identification ORDER BY COMMENT_ID DESC LIMIT $offest, $total_comments_per_page;");

$stmt->execute();

$comments = $stmt->get_result();
?>

<section class="main">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col">

            <!-- Wrapper for single posting -->

            <?php
            include('get_dataById.php');

            foreach($post_array as $post)
            {
                $data = get_UserData($post['User_ID']);

                $profile_img = $data[2];

                $profile_name = $data[0];?>

                <div class="post" id="post-id">

                    <div class="info">

                        <div class="user">

                            <div class="profile-pic"><img src="<?php echo "assets/images/profiles/". $profile_img; ?>"></div>

                            <p class="username"><?php echo $profile_name;?></p>

                        </div>

                        <?php

                        $id = $_SESSION['id'];

                        if($post['User_ID'] == $id){?>

                        <i class="fas fa-ellipsis-v options" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>

                        <?php }?>

                    </div>

                    <img src="<?php echo "assets/images/posts/". $post['Img_Path']; ?>" class="post-img">

                    <div id="data-contents">

                        <div class="post-content" id="post-content">

                            <div class="reactions-wrapper" id="reaction-wrapper">

                                <?php include('check_like_status.php');?>

                                <?php if($reaction_status){?>

                                    <form>
                                        <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_ids" id="post_ids">
                                        <button style="background: none; border: none;" type="submit" name="reaction">
                                            <i style="color: #fb3958;" class="icon fas fa-heart" onclick="return unlike();" id="unlike"></i>
                                        </button>
                                    </form>

                                <?php } else{?>

                                    <form>
                                        <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_id" id="post_id">
                                        <button style="background: none; border: none;" type="submit" name="reaction">
                                            <i style="color: #22262A;" class="icon fas fa-heart" onclick="return like();" id="like"></i>
                                        </button>
                                    </form>

                                <?php }?>

                            </div>

                            <input type="hidden" value="<?php echo $post['Likes'];?>" id="reaction-counter">

                            <p class="reactions" id="reaction-id"><?php echo $post['Likes'];?> Reactions</p>

                            <p class="description">

                                <span><?php echo $profile_name;?> Says :<br></span>

                                <?php echo $post['Caption'];?>
                            </p>

                            <p class="post-time"><?php echo date("M,Y,d", strtotime($post['Date_Upload']));?></p>

                            <p class="post-time" style="color: #0b5ed7"><?php echo $post['HashTags'];?></p>

                        </div>

                    </div>

                </div>

            <?php }?>

            <div class="col-md-12 col-lg-10 col-xl-8 mt-2 mb-2" style="width: 100%; ">

                <div class="card" style="border-radius: 10px; background: #F5F5F5; border-color: white;">

                    <div class="card-body">

                        <div class="d-flex flex-start align-items-center">

                            <div class="comments-section">

                                <img src="<?php echo 'assets/images/profiles/'.$_SESSION['img_path']?>" class="icon" style="width: 45px; height: 45px;">

                                <form class="comments-section" id="comments-section">

                                    <input type="text" class="comment-box" placeholder="Your Opinion" name="comment" id="comment">

                                    <input type="hidden" name="post_id" value="<?php echo $post['Post_ID']?>" id="post_identity">

                                    <button class="comment-button" type="submit" name="submit"><i class="fa-regular fa-paper-plane fa-lg"

                                        onclick="return comment();"></i></button>

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

                                <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Edit Post</a><br><br>

                                <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#delete_model" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Delete Post</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Model For Opinion Options -->
                <div class="modal fade" id="Comment-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Opinion Options</h5>
                            </div>
                            <div class="modal-body">

                                <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit-comment" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Edit Comment</a><br><br>

                                <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#delete_comment" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Delete Opinion</a>
                            </div>
                        </div>
                    </div>
                </div>

                <p><strong>EventsWave Community Opinion</strong></p>

                <div id="here">
                <?php

                foreach($comments as $comment)
                {
                    $data = get_UserData($comment['USER_ID']);

                    ?>

                    <div class="card mb-2" style="border-radius: 10px; background: #F5F5F5; border-color: white;">

                        <div class="card-body">

                            <p style="font-size: 15px;"><?php echo $comment['COMMENT']; ?></p>

                            <div class="d-flex justify-content-between">

                                <div class="d-flex flex-row align-items-center">

                                    <img class="mr-3" src="<?php echo "assets/images/profiles/" . $data[2]; ?>" alt="avatar" width="35" height="35" style="border-radius: 50%;"/>

                                    <p class="small mb-0 m-lg-2"><?php echo "\t".$data[0]; ?></p>

                                    <p class="text-muted small mb-0 m-lg-1"><?php echo "Posted Date : ".$comment['DATE']; ?></p>

                                </div>

                                <?php

                                $id = $_SESSION['id'];

                                if($comment['USER_ID'] == $id){?>

                                    <i class="fas fa-ellipsis-v options" data-bs-toggle="modal" data-bs-target="#Comment-Modal"></i>

                                <?php }?>

                            </div>

                        </div>

                    </div>

                <?php }?>

                </div>

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

            <div class="modal fade" id="delete_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5>Are You Really Want To Drop That Post ?</h5>

                            <p class="h6">
                                You will lose any associated comments and reactions made in relation to that post if you take that step.
                            </p>

                            <form action="Delete_Normal_Posts.php" method="post">
                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">

                                <button type="submit" class="btn btn-outline-primary" name="drop">Drop Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit-comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="post" action="Edit-Comment-1.php">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Your Opinion</label>
                                    <textarea class="form-control" id="message-text" maxlength="500" name="comment"><?php echo $comment['COMMENT']; ?></textarea>
                                </div>

                                <input type="hidden" name="comment_id" value="<?php echo $comment['COMMENT_ID'];?>">

                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">

                                <button type="submit" class="btn btn-outline-primary" name="edit-comment">Edit Your Opinion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="delete_comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5>Are You Really Want To Remove Your Opinion?</h5>

                            <p class="h6">
                                Think twice before removing your comment from the section because it may be beneficial for planning the greatest events ☹️
                            </p>

                            <form action="Delete_Normal_Comment.php" method="post">

                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">

                                <input type="hidden" name="comment_id" value="<?php echo $comment['COMMENT_ID'];?>">

                                <button type="submit" class="btn btn-outline-primary" name="drop_comments">Drop Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Design for right column -->

        <div class="right-col">

            <!-- structure for profile card section-->

            <div class="style-wrapper mt-2" style="background: #F5F5F5;">

                <div class="suggestion_card">

                    <div>
                        <img src="<?php echo "assets/images/profiles/".$_SESSION['img_path'];?>" style="border-radius: 50%; width: 60px; height: 60px; vertical-align: middle; float: left; margin-top: 6px;">
                    </div>

                    <div>
                        <p class="username" style="margin-left: 8px;"><?php echo $_SESSION['username'];?></p>

                        <p class="sub-text" style="margin-left: 19px;"><?php echo $_SESSION['fullname'];?></p>

                    </div>

                    <a href="logout.php"><button class="fallow-btn" style="margin-left: 30px; font-size: small">LOG OUT</button></a>

                </div>

            </div>
        </div>

    </div>

</section>

</body>

<script src="notifast/notifast.min.js"></script>

<script src="notifast/function.js"></script>

<script type="text/javascript">

    function like(){

        const post_id = document.getElementById('post_id').value;

        $.ajax({
            type:"post",
            url:"like.php",
            data:
                {
                    'post_id' :post_id,
                },
            cache:false,
            success: function (html)
            {
                $("#data-contents").load(window.location.href + " #data-contents" );
            }
        });
        return false;
    }

    function unlike(){

        const post_ids = document.getElementById('post_ids').value;

        $.ajax({
            type:"post",
            url:"unlike.php",
            data:
                {
                    'post_id' :post_ids,
                },
            cache:false,
            success: function (html)
            {
                $("#data-contents").load(window.location.href + " #data-contents" );
            }
        });
        return false;
    }

    function comment(){

        const post_id = document.getElementById('post_identity').value;

        const comment = document.getElementById('comment').value;

        $.ajax({
            type:"post",
            url:"comments_action.php",
            data:
                {
                    'post_id' :post_id,

                    'comment' : comment,
                },
            cache:false,
            success: function (html)
            {
                $("#here").load(window.location.href + " #here" );

                clearInput();

                notification_function("Success Message", "Your Opinion Successfully Shared With Community", "#0F73FA");
            }
        });

        return false;
    }

    function clearInput()
    {
        const getValue = document.getElementById("comment");

        if (getValue.value !="")
        {
            getValue.value = "";
        }
    }

    $(document).bind("contextmenu",function(e){
        return false;
    });
</script>

<script>
    $(document).ready(function()
    {
        setInterval(function(){
            $("#here").load(window.location.href + " #here");
        }, 10000);
    });
</script>


<script type="text/javascript">

    document.getElementById("logo-img").onclick = function ()
    {
        location.href = "home.php";
    };
</script>

</html>