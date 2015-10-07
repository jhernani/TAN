<?php	
template_header("EMPLOYEE");
template_navigation();
$obj->only("users");  
 


define("NEXT_PAGE","employee_reg");	


	echo $obj->table_header("<th>Employee</th><th>ID Number</th><th>Designation</th><th>Action</th>");
	foreach ($pdo->conn->query("SELECT * FROM tbl_employee WHERE active='1'") as $value) {
	 extract($value);
	
		echo '<tr>';
			echo '<td>'.$name.'</td>';
			echo '<td>'.$employee_id.'</td>';
			echo '<td>'.$obj->designation($designation).'</td>';
			echo '<td>';
			if($obj->if_match($_SESSION['userType'],"superadmin")==false):
				echo $obj->_attribute(NEXT_PAGE,"update",$obj->encrypt($id));
				if($obj->if_match($_SESSION['userType'],"hr")):
					echo $obj->_attribute(NEXT_PAGE,"inactive",$obj->encrypt($id));
					echo $obj->_attribute("employee_attendance","attendance",$obj->encrypt($id));
				endif;
			endif;
			echo '</td>';
		echo '</tr>';
	}
	echo $obj->table_footer();
	if($obj->if_match($_SESSION['userType'],"superadmin")==false):
		echo '<p>';
			if($obj->if_match($_SESSION['userType'],"hr")):
				echo $obj->_button(NEXT_PAGE,"add");
			endif;			
			if($obj->if_match($_SESSION['userType'],"accounting")):
				echo $obj->_button(PDF_PAGE,"pdf");
			endif;
				
		echo '</p>';
	endif;

template_footer();