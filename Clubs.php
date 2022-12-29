<?php

include('get_following.php');?>

    <div class="status-wrapper">

    <?php foreach($Clubs as $person){?>

            <form method="post" action="follower_acc.php" id="quick_access<?php echo $person['User_ID'];?>">

                <div class="status-card">

                    <input type="hidden" value="<?php echo $person['User_ID']?>" name="target_id">

                    <div class="profile-pic" style="cursor: pointer;">
                        <img onclick="document.getElementById('quick_access'+<?php echo $person['User_ID'];?>).submit();" src="<?php echo "assets/images/profiles/".$person['IMAGE']?>" name="quick_access">
                    </div>

                    <p class="username" style="color: gray; font-weight: bold;"><?php echo $person['USER_NAME']?></p>

                </div>

            </form>

    <?php }?>

</div>
