<?php 
template_header('USER REGISTRATION');	 
template_navigation();
$obj->only("superadmin");   						

define("BACK_PAGE","users");
define("THIS_PAGE","users_reg");
define("TABLE","tbl_users");

require_once('config/updatedelete.php');

if(isset($_POST['btn-save'])){	$form = $_POST;  extract($_POST);
	if($pdo->existData(TABLE,array('username'=>$form['username']))==false ){
		if($pdo->insertData(TABLE,array('name'=>$form['name'],'username'=>$form['username'],'password'=>$form['password'],'type'=>$form['type']))){
			
			$message = $obj->_message("success","Save Successfully");
		}
	}else{
		$message = $obj->_message("error","Username is already exist");	
	}
	
}
if(isset($_POST['btn-update'])){ $form = $_POST;  
	if($pdo->existData(TABLE,array('username'=>$form['username']))==true AND $username == $form['username']
	OR $pdo->existData(TABLE,array('username'=>$form['username']))==false AND $username != $form['username']){
	
		if($pdo->updateData(TABLE,array('name'=>$form['name'],'username'=>$form['username'],'password'=>$form['password'],'type'=>$form['type']),array('id'=>$obj->decrypt($ACTION[2])))){
			extract($pdo->fetchData(TABLE,array('id'=>$obj->decrypt($ACTION[2]))));
			$message = $obj->_message("success","Update Successfully");
		}
	}else{
		$message = $obj->_message("error","Username is already exist");	
	}
}


if(isset($type) AND $type=="superadmin"): $obj->_header("users"); endif;

?>
<div class="row" style="max-width: 500px; margin: 0 auto 10px; " >
<?php if(isset($message))echo $message; ?>
    <form action="" method="post" role="form"> 
		<div class="form-group"> 
			<label for="name">Name</label> 
			<input name="name" type="text" class="form-control" placeholder="" value="<?php if(isset($name))echo $name; ?>" maxlength="30" required > 
		</div> 
		<div class="form-group"> 
			<label for="username">Username</label> 
			<input name="username" type="text" class="form-control" placeholder="" value="<?php if(isset($username))echo $username; ?>" maxlength="30" required> 
		</div> 
	 
		<div class="form-group"> 
			<label for="password">Password</label> 
			<input name="password" type="text" class="form-control" placeholder="" value="<?php if(isset($password))echo $password; ?>" maxlength="30" required > 
		</div> 
		
		<div class="form-group"> 
			<label for="type">Account Type</label> 
				<select name="type" class="form-control"  required  > 		 
					<option <?php if(isset($type) && $obj->if_match($type,"accounting" ))echo "selected"; ?>  value="accounting">Accounting</option> 
					<option <?php if(isset($type) && $obj->if_match($type,"hr"         ))echo "selected"; ?>  value="hr">HR</option>	 
		
				</select> 
		</div> 
		 
<?php	require_once('config/buttonform.php');	?>
	</form>
</div>


<?php
template_footer(); 