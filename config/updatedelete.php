<?php
if(isset($ACTION[1]) AND $obj->if_match($ACTION[1],"update" ) ){
	if(isset($ACTION[2])){
		if($pdo->existData(TABLE,array('id'=>$obj->decrypt($ACTION[2])))){
			extract($pdo->fetchData(TABLE,array('id'=>$obj->decrypt($ACTION[2]))));
		}else{	$obj->_header(BACK_PAGE); }	
	}else{ $obj->_header(BACK_PAGE); }
}
if(isset($ACTION[1]) AND $obj->if_match($ACTION[1],"delete" ) ){
	if(isset($ACTION[2])){
		if($pdo->deleteData(TABLE,$obj->decrypt($ACTION[2]))){
			//$message = $obj->_message("error","Delete Successfully");
			$obj->_header(BACK_PAGE);
		}else{	$obj->_header(BACK_PAGE);	}	
	}else{		$obj->_header(BACK_PAGE);	}
}
if(isset($ACTION[1]) AND $obj->if_match($ACTION[1],"inactive" ) ){
	if(isset($ACTION[2])){
		if($pdo->updateData(TABLE,array('active'=>0),array('id'=>$obj->decrypt($ACTION[2])))){
			$obj->_header(BACK_PAGE);
		}else{	$obj->_header(BACK_PAGE);	}	
	}else{		$obj->_header(BACK_PAGE);	}
}
if(isset($ACTION[1]) AND $obj->if_match($ACTION[1],"active" ) ){
	if(isset($ACTION[2])){
		if($pdo->updateData(TABLE,array('active'=>1),array('id'=>$obj->decrypt($ACTION[2])))){
			$obj->_header(BACK_PAGE);
		}else{	$obj->_header(BACK_PAGE);	}	
	}else{		$obj->_header(BACK_PAGE);	}
}

if(isset($ACTION[1]) AND $obj->if_match($ACTION[1],"attendance" ) ){
	if(isset($ACTION[2])){
		if($pdo->existData("tbl_employee",array('id'=>$obj->decrypt($ACTION[2])))){
			extract($pdo->fetchData("tbl_employee",array('id'=>$obj->decrypt($ACTION[2]))));
		}else{	//$obj->_header(BACK_PAGE);
		}	
	}else{ $obj->_header(BACK_PAGE); 
	}
}


