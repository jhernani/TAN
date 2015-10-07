<?php 
template_header('LOGIN');
template_navigation();
$obj->noaccess("superadmin");
$obj->noaccess("accounting");
$obj->noaccess("hr");

define("TABLE","tbl_users");   																				

if(isset($_POST['btn-save'])){
	extract($_POST);          																				
		if($pdo->existData(TABLE,array('username'=>$username,'password'=>$password))){  				
			$obj->_header("home");  																				
				$tbl_employee = $pdo->fetchData(TABLE,array('username'=>$username,'password'=>$password)); 
					$_SESSION['userID'] 	= $tbl_employee['id'];											
					$_SESSION['userName']	= $tbl_employee['name'];
					$_SESSION['userType'] 	= $tbl_employee['type'];	
		}else{
			$message = $obj->_message("error","Login Details Incorrect. Please try again.");
		}
}
?>


<h3 class="ui block header" style="max-width: 350px; margin: 0 auto 10px;">
<div class="row" style="max-width: 350px; margin: 0 auto 10px;" > 

<h2 class="ui header"> <center>
  <img src="theme/img/icon.png" class="ui circular image">
  
</h2>
	<hr>
	<?php if(isset($message))echo $message; ?>
	<form action="" method="post" role="form">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php if(isset($username))echo $username; ?>" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>


		<button class="btn btn-primary" type="submit" name="btn-save"> Login </button>
		<button class="btn " type="reset" name="reset">Cancel </button>
	</form>
	
</div>
</h3>
<?php 
template_footer(); 