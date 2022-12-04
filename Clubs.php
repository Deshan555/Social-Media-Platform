<?php include('get_following.php');?>

<div class="status-wrapper">

    <?php foreach($Clubs as $person){?>

            <form method="post" action="user-profile.php" id="quick_access">

                <div class="status-card">

                    <input type="hidden" value="<?php $person['User_ID']?>" name="target_id">

                    <div class="profile-pic" style="cursor: pointer;"><img onclick="document.getElementById('quick_access').submit();" src="<?php echo "assets/images/".$person['IMAGE']?>"> </div>

                    <p class="username"><?php echo $person['USER_NAME']?></p>

                </div>

            </form>

    <?php }?>

</div>

