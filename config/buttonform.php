<?php
			if(isset($ACTION[1]) AND $obj->if_match($ACTION[1],"update" )){	
				echo $obj->_buttonForm("update");
			}else{ 	
				echo $obj->_buttonForm("save"); 
			}
				echo $obj->_button(BACK_PAGE,"back");