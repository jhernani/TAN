<?php	
template_header("EMPLOYEE ATTENDANCE");
template_navigation();
$obj->only("users");   
 
define("BACK_PAGE","employee");	
define("PDF_PAGE","pdf"); 
define("TABLE","tbl_time");
require_once('config/updatedelete.php');

echo '<p>Employee Name: <b> '.$pdo->selectData("tbl_employee","name",array('id'=>$id)).' </b></p>';

echo '<p>Employee ID NUMBER: <b> '.$pdo->selectData("tbl_employee","employee_id",array('id'=>$id)).' </b> </p>';
echo '<br />';
	echo $obj->table_header("<th>Date</th><th>Time In</th><th>Time Out</th>");
	foreach ($pdo->conn->query("SELECT * FROM tbl_time WHERE employee_id='".$obj->decrypt($ACTION[2])."'") as $value) {
	 extract($value);
	
		echo '<tr>';
			echo '<td>'.$obj->normal_date($date).'</td>';
			echo '<td>'.$obj->normal_time($time_in).'</td>';
			echo '<td>'.$obj->normal_time($time_out).'</td>';
			 
		echo '</tr>';
	}
	echo $obj->table_footer();
	if($obj->if_match($_SESSION['userType'],"superadmin")==false):
		echo '<p>';
		 
				echo $obj->_button(BACK_PAGE,"back");
			 
			
		echo '</p>';
	endif;

template_footer();