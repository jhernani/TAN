<?php 
template_header('WELCOME');
template_navigation();
$obj->only("users");
?>

<img background="theme/img/background.jpg"> 

<div class="row" style="max-width: 50%; margin: 0 auto 10px; "> 
<a href="#" class="thumbnail"> <img src="theme/img/image.png" alt="<?php echo TITLE_EXTENSION; ?>"> </a>

 <center>
 <a href="<?php echo URL_ROOT."attendance";?>" type="button" class="btn btn-default btn-lg btn-block"> <i class="list layout icon"> Attendance </i> </a>
 <?php if($_SESSION['userType']=="superadmin"):?>
 <a href="<?php echo URL_ROOT."users";?>" type="button" class="btn btn-default btn-lg btn-block"> <i class="users icon"> Manage Users </i> </a>
 <?php endif;?>
 <a href="<?php echo URL_ROOT."employee";?>" type="button" class="btn btn-default btn-lg btn-block"> <i class="user icon">View Employee </i> </a>
 <a href="<?php echo URL_ROOT."logout";?>" type="button" class="btn btn-default btn-lg btn-block"> <i class="sign out icon"> Logout </i> </a> 
  </center>


</div>


<?php
template_footer();  