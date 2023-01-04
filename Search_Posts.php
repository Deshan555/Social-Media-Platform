
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Title</title>

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

</head>

<?php

include('config.php');


if(isset($_POST['search'])){

    $search_input = $_POST['find'];

    $SQL = "SELECT * FROM posts WHERE Caption LIKE '%$search_input%' OR HashTags LIKE '%$search_input%';";

    echo $SQL;

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


<main>
    <div class="discover-container">
        <div class="gallery">

            <?php foreach($posts as $post){ ?>

            <div class="gallery-item">
                <img assets src="<?php echo "assets/images/posts/".$post['Img_Path'];?>" class="gallery-image" alt="">
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes"><span
                                class="hide-gallery-element"><?php echo $post['Likes']; ?></span>
                            <i class="fas fa-heart"></i>
                        </li>
                        <li class="gallery-item-comments"><span class="hide-gallery-element"></span>
                            <a href="single_post.php?post_id=<?php echo $post['Post_ID'];?>" style="color: #fff;"><i
                                    class="fas fa-comment"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <?php } ?>

        </div>


</main>
        <main>

            <div class="discover-container">

                <div class="gallery">

                    <?php foreach($posts as $post){ ?>

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

                    <?php }?>

                </div>

            </div>
        </main>
</body>
</html>