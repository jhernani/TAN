<body background="theme/img/background.jpg"> 
<?php
template_header("ATTENDANCE");
template_navigation();
$obj->only("users"); 

define("NEXT_PAGE","attendance_reg");


	echo  $obj->table_header("<th>Employee</th><th>ID Number</th><th>Date</th><th>Time In</th><th>Time Out</th>");
	//WHERE date='".date("Y-m-d")."' ORDER by datetime DESC
  	foreach ($pdo->conn->query("SELECT * FROM tbl_time  ") as $value) {  extract($value);
	   

		echo '<tr>';
			echo '<td>'. strtoupper($pdo->selectData('tbl_employee','name',array('id'=>$value['employee_id']))). '</td>';
			echo '<td>'. strtoupper($pdo->selectData('tbl_employee','employee_id',array('id'=>$value['employee_id']))). '</td>';
			echo '<td>'. $date.'</td>';
			echo '<td>'. $obj->normal_time($time_in).'</td>';
			echo '<td>'. $obj->normal_time($time_out).'</td>';
		 
		echo '</tr>';
	}
	echo $obj->table_footer();
	 
template_footer();