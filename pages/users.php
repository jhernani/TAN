<?php
template_header("USERS");
template_navigation();
$obj->only("superadmin"); 

define("NEXT_PAGE","users_reg");    
define("PDF_PAGE","pdf_users"); 

	echo $obj->table_header("<th>Name</th><th>Account Type</th><th>Username</th><th>Action</th>");
	foreach ($pdo->conn->query("SELECT * FROM tbl_users WHERE type != 'superadmin'") as $value) {     
	extract($value);
		echo '<tr>';
			echo '<td>'.$name.'</td>';
			echo '<td>'.$type.'</td>';
			echo '<td>'.$username.'</td>';
			echo '<td>';
			echo $obj->_attribute(NEXT_PAGE,"update",$obj->encrypt($id));
			echo $obj->_attribute(NEXT_PAGE,"delete",$obj->encrypt($id));
			echo '</td>';
		echo '</tr>';
	}
	echo $obj->table_footer();
	echo '<p>';
	echo $obj->_button(NEXT_PAGE,"add");
	echo '</p>';


template_footer();