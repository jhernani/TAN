<?php
template_header('INACTIVE EMPLOYEE');
template_navigation();
$obj->only("users");
$obj->noaccess("superadmin");

define("BACK_PAGE","inactive_employee");
define("THIS_PAGE","inactive_employee_reg");
define("TABLE","tbl_employee");

require_once('config/updatedelete.php');

if(isset($_POST['btn-save'])){	$form = $_POST; extract($_POST);
	if($pdo->existData(TABLE,array('employee_id'=>$form['employee_id']))==false ){
		if($obj->if_match($_SESSION['userType'],"hr")){
			$params = array('name'=>$form['name'],'employee_id'=>$form['employee_id'],'type'=>$form['type'],'gender'=>$form['gender'],'birthdate'=>$form['birthdate'],'address'=>$form['address'],'designation'=>$form['designation'],'hire'=>$form['hire']);
		}else if($obj->if_match($_SESSION['userType'],"accounting")){
			$params = array('tax'=>$form['tax'],'sss'=>$form['sss'],'pag_ibig'=>$form['pag_ibig'],'philhealth'=>$form['philhealth'],'sss_loan'=>$form['sss_loan'],'pag_ibig_loan'=>$form['pag_ibig_loan'],'salary'=>$form['salary'],'company_loan'=>$form['company_loan']);	
		}
		if($pdo->insertData(TABLE,$params)){
			$message = $obj->_message("success","Save Successfully");
		}
	}else{
		$message = $obj->_message("error","Employee ID is already exist");	
	}
}
if(isset($_POST['btn-update'])){	$form = $_POST; 
 
if($obj->if_match($_SESSION['userType'],"hr")):$ei = $form['employee_id']; endif;
if($obj->if_match($_SESSION['userType'],"accounting")):$ei = $employee_id; endif;
 
	if($pdo->existData(TABLE,array('employee_id'=>$ei))==true AND $employee_id == $ei
		OR $pdo->existData(TABLE,array('employee_id'=>$ei))==false AND $employee_id != $ei){
		
		if($obj->if_match($_SESSION['userType'],"hr")){
			$params = array('name'=>$form['name'],'employee_id'=>$form['employee_id'],'type'=>$form['type'],'gender'=>$form['gender'],'birthdate'=>$form['birthdate'],'address'=>$form['address'],'designation'=>$form['designation'],'hire'=>$form['hire']);
		}else if($obj->if_match($_SESSION['userType'],"accounting")){
			$params = array('tax'=>$form['tax'],'sss'=>$form['sss'],'pag_ibig'=>$form['pag_ibig'],'philhealth'=>$form['philhealth'],'sss_loan'=>$form['sss_loan'],'pag_ibig_loan'=>$form['pag_ibig_loan'],'salary'=>$form['salary'],'company_loan'=>$form['company_loan']);	
		}
		if($pdo->updateData(TABLE,$params,array('id'=>$obj->decrypt($ACTION[2])))){
			extract($pdo->fetchData(TABLE,array('id'=>$obj->decrypt($ACTION[2]))));
			$message = $obj->_message("success","Update Successfully");	
		} 
	}else{
		$message = $obj->_message("error","Employee ID is already exist");	
	}
}

?>
<div class="row" style="max-width: 500px; margin: 0 auto 10px; " >
<?php if(isset($message))echo $message; ?>
    <form action="" method="post" role="form"> 
		<div class="form-group">
			<label for="name">Name</label>
			<input name="name" type="text" class="form-control" placeholder="" value="<?php if(isset($name))echo $name; ?>" maxlength="35" required <?php echo $_SESSION['userType']!="hr" ? 'disabled':'';  ?> >
		</div> 
		<div class="form-group">
			<label for="employee_id">ID Number</label>
			<input name="employee_id" type="text" class="form-control" placeholder="" value="<?php if(isset($employee_id))echo $employee_id; ?>" maxlength="15" required <?php echo $_SESSION['userType']!="hr" ? 'disabled':'';  ?> >
		</div>
<?php if($_SESSION['userType']=="hr"): ?>
		<div class="form-group"> 
			<label for="type">Type</label> 
				<select name="type" class="form-control"  required> 		 
					<option <?php if(isset($type) && $obj->if_match($type,""))echo "selected"; ?>  value=""></option> 
					<option <?php if(isset($type) && $obj->if_match($type,"regular"))echo "selected"; ?>  value="regular">Regular</option> 
					<option <?php if(isset($type) && $obj->if_match($type,"casual"))echo "selected"; ?>  value="casual">Casual</option>	 
					  
				</select> 
		</div>		
		<div class="form-group"> 
			<label for="gender">Gender</label> 
				<select name="gender" class="form-control"  required> 		 
					<option <?php if(isset($gender) && $obj->if_match($gender,""))echo "selected"; ?>  value=""></option> 
					<option <?php if(isset($gender) && $obj->if_match($gender,"male"))echo "selected"; ?>  value="male">Male</option> 
					<option <?php if(isset($gender) && $obj->if_match($gender,"female"))echo "selected"; ?>  value="female">Female</option>	 
					  
				</select> 
		</div>
		<div class="form-group">
                <label for="birthdate">Birth Date</label>
                 <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM dd,yyyy" data-link-field="dtp_input2" data-link-format="Y-m-d">
                   	<input readonly name="birthdate"  type="text" class="form-control" placeholder="" value="<?php if(isset($birthdate))echo $birthdate; ?>" required >

                   <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" />
        </div>
		<div class="form-group">
			<label for="address">Address</label>
			<input name="address" type="text" class="form-control" placeholder="" value="<?php if(isset($address))echo $address; ?>" maxlength="30" required>
		</div>
	 <div class="form-group">
                <label for="hire">Date Hire</label>
                 <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM dd,yyyy" data-link-field="dtp_input2" data-link-format="Y-m-d">
                   	<input readonly name="hire"  type="text" class="form-control" placeholder="" value="<?php if(isset($hire))echo $hire; ?>" required >

                   <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" />
        </div>
		<div class="form-group"> 
			<label for="designation">Designation</label> 
				<select name="designation" class="form-control" required > 		 
					<option <?php if(isset($designation) && $obj->if_match($designation,""))echo "selected"; ?>  value=""></option> 
					<option <?php if(isset($designation) && $obj->if_match($designation,"TD"))echo "selected"; ?>  value="TD">Truck Driver</option> 
					<option <?php if(isset($designation) && $obj->if_match($designation,"TH"))echo "selected"; ?>  value="TH">Truck Helper</option>	 
					<option <?php if(isset($designation) && $obj->if_match($designation,"FDS"))echo "selected"; ?>  value="FDS">Front Desk Staff</option> 
					<option <?php if(isset($designation) && $obj->if_match($designation,"SM"))echo "selected"; ?>  value="SM">Service Men</option>	 
					<option <?php if(isset($designation) && $obj->if_match($designation,"SS"))echo "selected"; ?>  value="SS">Service Supervisor</option> 
					<option <?php if(isset($designation) && $obj->if_match($designation,"WS"))echo "selected"; ?>  value="WS">Warehouse Supervisor</option>	 
					<option <?php if(isset($designation) && $obj->if_match($designation,"AWS"))echo "selected"; ?>  value="AWS">Assistant Warehouse Supervisor</option> 
					<option <?php if(isset($designation) && $obj->if_match($designation,"MC"))echo "selected"; ?>  value="MC">Messenger / Collector</option>	 
					<option <?php if(isset($designation) && $obj->if_match($designation,"FS"))echo "selected"; ?>  value="FS">Finance Staff</option> 
					<option <?php if(isset($designation) && $obj->if_match($designation,"LS"))echo "selected"; ?>  value="LS">Logistics Staff</option>	 
					<option <?php if(isset($designation) && $obj->if_match($designation,"SAM"))echo "selected"; ?>  value="SAM">Sales Manager</option> 
					<option <?php if(isset($designation) && $obj->if_match($designation,"SR"))echo "selected"; ?>  value="SR">Sales Representatives</option>	 
				</select> 
		</div> 
		
<?php endif; ?>		
<?php if($_SESSION['userType']=="accounting"): ?>
		<div class="form-group">
			<label for="salary">Salary</label>
			<input name="salary" type="text" class="form-control" placeholder="" value="<?php if(isset($salary))echo $salary; ?>" maxlength="7" required>
		</div>
		<div class="form-group">
			<label for="tax">Tax</label>
			<input name="tax" type="text" class="form-control" placeholder="" value="<?php if(isset($tax))echo $tax; ?>" maxlength="7" required>
		</div>
		<div class="form-group">
			<label for="sss">SSS</label>
			<input name="sss" type="text" class="form-control" placeholder="" value="<?php if(isset($sss))echo $sss; ?>" maxlength="7" required>
		</div>
		<div class="form-group">
			<label for="pag_ibig">PAG-IBIG</label>
			<input name="pag_ibig" type="text" class="form-control" placeholder="" value="<?php if(isset($pag_ibig))echo $pag_ibig; ?>" maxlength="7" required>
		</div>
		<div class="form-group">
			<label for="philhealth">PHIL-HEALTH</label>
			<input name="philhealth" type="text" class="form-control" placeholder="" value="<?php if(isset($philhealth))echo $philhealth; ?>" maxlength="7" required>
		</div>
		<div class="form-group">
			<label for="sss_loan">SSS LOAN</label>
			<input name="sss_loan" type="text" class="form-control" placeholder="" value="<?php if(isset($sss_loan))echo $sss_loan; ?>" maxlength="7" required>
		</div>
		<div class="form-group">
			<label for="pag_ibig_loan">PAG IBIG LOAN</label>
			<input name="pag_ibig_loan" type="text" class="form-control" placeholder="" value="<?php if(isset($pag_ibig_loan))echo $pag_ibig_loan; ?>" maxlength="7" required>
		</div>
		<div class="form-group">
			<label for="company_loan">COMPANY LOAN</label>
			<input name="company_loan" type="text" class="form-control" placeholder="" value="<?php if(isset($company_loan))echo $company_loan; ?>" maxlength="7" required>
		</div>
<?php endif; ?>	

<?php	if($_SESSION['userType']!="superadmin"): 
			if($pdo->existData(TABLE,array('id'=>$id,'active'=>1))){
				require_once('config/buttonform.php'); 
			}else{ echo $obj->_button(BACK_PAGE,"back"); }
		endif;	?>
	</form>
</div>
<?php
template_footer(); 