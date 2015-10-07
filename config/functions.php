<?php
class _functions{
	public function _attribute($next_page,$action,$id){
		switch ($action){
			case 'update';
				$icon = 'edit';
					$validation = '';
						$title = 'UPDATE';
							break;
			case 'delete';
				$icon = 'trash';
					$validation = 'onclick="return confirm(\'Are you sure you want to delete this record?\');"';
						$title = 'DELETE';
							break;
			case 'inactive';
				$icon = 'trash';
					$validation = 'onclick="return confirm(\'Are you sure you want to deactivate this record?\');"';
						$title = 'DEACTIVATE';
							break;
			case 'active';
				$icon = 'pushpin';
					$validation = 'onclick="return confirm(\'Are you sure you want to activate this record?\');"';
						$title = 'ACTIVATE';
							break; 
			case 'attendance';
				$icon = 'th-list';
					$validation = '';
						$title = 'ATTENDANCE';
							break;
		}
		$var = '<div class="btn-group btn-group-xs">
					<a title="'.$title.'" class="btn btn-default"  href="'.URL_ROOT.''.$next_page.'/'.$action.'/'.$id.'" '.$validation.'>
						<span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span>
							</a>
								</div>&nbsp';
									echo $var;
	}
	public function _button($next_page,$action){
		switch ($action){
			case 'add';
				$icon = 'plus';
					$button = 'ADD RECORD';
						$type = "button";
							$target = "";
								break;
		
			case 'back';
				$icon = '';
					$button = 'Back';
						$type = "button";
							$target = "";
								break;
		}
		$var = '&nbsp<a href="'.URL_ROOT."".$next_page.'" type="'.$type.'"  target= "'.$target.'" class="btn btn-default">
					<span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span>&nbsp;'.$button.'</a>&nbsp';
						return $var;
	}
	public function _buttonForm($action){
		switch ($action){
			case 'save';
				$icon 	= '';
					$button = 'Save';
						$type 	= "submit";
							$name 	= "btn-save";
								break;
			case 'update';
				$icon 	= '';
					$button = 'Update';
						$type 	= "submit";
							$name 	= "btn-update";
								break;
			case 'reset';
				$icon 	= 'repeat';
					$button = 'Cancel';
						$type 	= "reset";
							$name 	= "reset";
								break;
			case 'time-in';
				$icon 	= 'time';
					$button = 'Time In';
						$type 	= "submit";
							$name 	= "btn-in";
								break;
			case 'time-out';
				$icon 	= 'time';
					$button = 'Time Out';
						$type 	= "submit";
							$name 	= "btn-out";
								break;
		}
		$var = '<button class="btn btn-default" type="'.$type.'" name="'.$name.'" >
				<span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span>&nbsp;'.$button.'</button>&nbsp';
					return $var;
	}
	public function table_header($th){
		$var = '<p></p>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead><tr>'.$th.'</tr></thead>
			<tfoot><tr>'.$th.'</tr></tfoot>
			<tbody>';	
				return $var;	
	}
	public function table_footer(){
		$var = '</tbody></table>';
			return $var;
	}
	public function encrypt($sData){
		$id=(double)$sData*525325.24;
			return base64_encode($id);
	}
	public function decrypt($sData){
		$url_id=base64_decode($sData);
			$id=(double)$url_id/525325.24;
				return $id;
	}
	public function if_match($data1,$data2){
		if($data1 == $data2){
			return true;
				}else{
					return	false;
				}
	}	
	public function _header($data=""){
		echo header("Location: ".URL_ROOT."".$data);
	}
	 
	public function _message($result,$message="message"){
		switch ($result){
			case 'success';
				$alert = "positive";
					break;
			case 'error';
				$alert = "error";
					break;
			case 'info';
				$alert = "info";
					break;
			default:
				$alert = "warning";
					break;
		}
		$var = '<div class="alert alert-'.$alert.' alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>
				'.$message.'</div>';
				
				
		$semantic = "  <div class=\"ui ".$alert." message\">".$message."</div>";		
				
					return $semantic;	
	}
	public function only($data){

		if(!empty($data)){
			if(isset($_SESSION['userType'])){
				if($data!="users"){
					if($_SESSION['userType']!=$data){
						echo $this->_header("noaccess");
					}
				}
			}else { echo $this->_header("noaccess"); } 
		}
		 
	}
	public function noaccess($data){

		if(!empty($data)){
			if(isset($_SESSION['userType']) AND $_SESSION['userType']==$data){		 
				echo $this->_header("noaccess");	 
			} 
		}
		 
	}

	public function normal_time($time){
		$time = strtotime($time);  	
			$hour = date("H",$time);
				$AmPm = $hour > 11 ? "pm" : "am";
					if(date("H:i:s",$time)=="00:00:00"){
						$result = "<div align='center'></div>";
					}else{
						$result = date("h:i:s ",$time)." ".$AmPm;
					}
					return $result; 
	}	
	public function normal_date($date){
		$date = strtotime($date);  	
			return date("M d, Y",$date);
	}
	public function designation($data){
		 switch($data){

		case 'FDS';$result = "Front Desk Staff";break;
		case 'SS';$result = "Service Supervisor";break;
		case 'WS';$result = "Warehouse Supervisor";break;
		case 'AWS';$result = "Assistant Warehouse Supervisor";break;
		case 'MC';$result = "Messenger / Collector";break;
		case 'FS';$result = "Finance Staff";break;
		case 'LS';$result = "Logistics Staff";break;
		case 'SAM';$result = "Sales Manager";break;
		case 'SR';$result = "Sales Representatives";break;
		default:$result="";break;
	
	 } return $result;
	}
	public function money($data){
		$money =  number_format($data,2,'.',',');
		return $money;
	}
}