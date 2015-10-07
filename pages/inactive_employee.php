<?php	
template_header("INACTIVE EMPLOYEE");
template_navigation();
$obj->only("users");  
$obj->noaccess("superadmin"); 
$obj->noaccess("accounting"); 


define("NEXT_PAGE","inactive_employee_reg");	
define("PDF_PAGE","pdf"); 

	echo $obj->table_header("<th>Employee</th><th>ID Number</th><th>Designation</th><th>Action</th>");
	foreach ($pdo->conn->query("SELECT * FROM tbl_employee WHERE active='0'") as $value) {
	 extract($value);
	
		echo '<tr>';
			echo '<td>'.$name.'</td>';
			echo '<td>'.$employee_id.'</td>';
			echo '<td>'.$obj->designation($designation).'</td>';
			echo '<td>';
			if($obj->if_match($_SESSION['userType'],"superadmin")==false):
				// echo $obj->_attribute(NEXT_PAGE,"update",$obj->encrypt($id));
				if($obj->if_match($_SESSION['userType'],"hr")):
					// echo $obj->_attribute(NEXT_PAGE,"delete",$obj->encrypt($id));
					echo $obj->_attribute(NEXT_PAGE,"active",$obj->encrypt($id));
				endif;
			endif;
			echo '</td>';
		echo '</tr>';
	}
	echo $obj->table_footer();
	if($obj->if_match($_SESSION['userType'],"superadmin")==false):
		echo '<p>';
			
	endif;

template_footer();