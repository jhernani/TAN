<?php 
template_header("TIME");
if(isset($_SESSION['userID'])){
template_navigation();
}else{
	echo "<br><br><br><br>";
}


$tt = date(DATE_FORMAT);

if(isset($_POST['btn-in'])){
	$var = $_POST;
 
	if($pdo->existData("tbl_employee",array("employee_id"=>$var['employee_id']))){  											
	 	$tbl_employee = $pdo->fetchData("tbl_employee",array("employee_id"=>$var['employee_id'])); 										
			if($obj->if_match($tbl_employee['active'],1)){   																	
				if($pdo->existData("tbl_time",array("employee_id"=>$tbl_employee['id'],"date"=>date("Y-m-d")))==false){ 		
					if($pdo->insertData("tbl_time",array('employee_id'=>$tbl_employee['id'],'time_out'=>0,'time_in'=>$tt,'date'=>$tt,'datetime'=>$tt))){  
						$message = $obj->_message("success","Save Successfully");
					}
				}else{	$message = $obj->_message("error","You already timed in this day");		}
			}else{	$message = $obj->_message("error","The account is already deactivate");		}
	}else{	$message = $obj->_message("error","Unknown ID Number");		}
} // time in

if(isset($_POST['btn-out'])){
	$var = $_POST;
	if($pdo->existData("tbl_employee",array("employee_id"=>$var['employee_id']))){   										
	 	$tbl_employee = $pdo->fetchData("tbl_employee",array("employee_id"=>$var['employee_id'])); 							
		if($obj->if_match($tbl_employee['active'],1)){   																	
			if($pdo->existData("tbl_time",array("employee_id"=>$tbl_employee['id'],"date"=>date("Y-m-d")))==true){ 			
				$tbl_time = $pdo->fetchData("tbl_time",array("employee_id"=>$tbl_employee['id'],"date"=>date("Y-m-d")));	
					if($obj->if_match($tbl_time['time_out'],"00:00:00")==true){
						if($pdo->updateData("tbl_time",array('time_out'=>$tt,'datetime'=>$tt),array("id"=>$tbl_time['id']))){	
							$message = $obj->_message("success","Update Successfully");
						}
					}else{	$message = $obj->_message("error","You already timed out this day");		}
			}else{	
					if($pdo->insertData("tbl_time",array('employee_id'=>$tbl_employee['id'],'time_out'=>$tt,'date'=>$tt,'datetime'=>$tt))){  
						$message = $obj->_message("success","Save Successfully");
					}
			}
		}else{	$message = $obj->_message("error","The account is already deactivate");		}
	}else{	$message = $obj->_message("error","Unknown ID Number");		}
} // time out
?>
<div class="ui two column grid">         
    <div class="row">
		<div class="column">
			<div class="row" style="max-width: 350px; margin: 0 auto 10px;" >
				<h1 align="center"> <div id="txt"></div><?php echo date("M d,Y D ");?></h1><hr>
					<?php if(!isset($_SESSION['userID'])):?>	
						<form action="" method="post" role="form">
							<div class="form-group">

								<label for="employee_id">ID NUMBER</label>
								<input type="text" name="employee_id" class="form-control" placeholder="" maxlength="30" required autofocus autocomplete="off">
							</div>
							<?php
								echo $obj->_buttonForm("time-in");
								echo $obj->_buttonForm("time-out");
								echo $obj->_buttonForm("reset");
							?>
						</form>
					<?php endif;?>
					<br><?php if(isset($message))echo $message; ?>
					
			</div>
		</div>
        <div class="column">
			<table class="ui inverted table">
				<thead>
					<tr>
						<th rowspan="2"><div class="ui big horizontal divided list">
                            <div class="item">
                        	<img class="ui avatar image" src="theme/img/emp.png">
    							<div class="content">
    						  <div class="header"> <font color="white">Employee</div> </font>
   						       </div> </th>
						<th colspan="2"><center>Time</th> </center>
					</tr>
					<tr>
						<th class = "center">IN</th>
						<th>OUT</th>
					</tr>
				</thead>
				<tbody>
				<?php 	foreach ($pdo->conn->query("SELECT * FROM tbl_time WHERE date='".date("Y-m-d")."' ORDER by datetime DESC") as $value) { ?>		
					<tr>
						<td><?php echo strtoupper($pdo->selectData('tbl_employee','name',array('id'=>$value['employee_id'])));?></td>
						<td><?php echo $obj->normal_time($value['time_in']);?></td>             
						<td><?php echo $obj->normal_time($value['time_out']);?></td>
					</tr>
				<?php } ?>     
				</tbody>
			</table>
       </div>
    </div>
</div>   
 
<?php
template_footer();  