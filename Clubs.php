<?php include('get_following.php');?>

<div class="status-wrapper">

    <?php foreach($Clubs as $person){?>

    <div class="status-card">

        <div class="profile-pic"><img src="<?php echo "assets/images/".$person['IMAGE']?>"> </div>

        <p class="username"><?php echo $person['USER_NAME']?></p>

    </div>

    <?php }?>

</div>

