<?php
class oopCrud{
	 
public static $conn = null;
	
	public function __construct(){
		if ( null == self::$conn ){
			try{
				$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
		    }catch(PDOException $e){
				die($e->getMessage());
			}
       }
	}
	
	public function existData($table,$where){
		$w = array_keys($where);
			foreach($w as $val){	$field[]	= $val."=?";	}
				$q = $this->conn->prepare("SELECT * FROM ".$table." WHERE ".implode(' AND ',$field));
					$q->execute(array_values($where));		
						if($q->rowCount()>0){	return true; }else{	return false; }	
	}
	public function fetchData($table,$params){
		$k = array_keys($params);	
			foreach($k as $val){	$fields[]	= $val."=?"; 	}
				$q = $this->conn->prepare("SELECT * FROM ".$table." WHERE ".implode(' AND ',$fields));
					$q->execute(array_values($params));		
						$data = $q->fetch(PDO::FETCH_ASSOC);
							return $data;
	}

	public function updateData($table,$params,$where){
			$k = array_keys($params);	
			$w = array_keys($where);
				foreach($k as $val){	$fields[]	= $val."=?"; 	}
				foreach($w as $val){	$field[]	= $val."=?";	}
						$q = $this->conn->prepare("UPDATE ".$table." SET ".implode(',',$fields)." WHERE ".implode(' AND ',$field));
							$check = $q->execute(array_merge(array_values($params),array_values($where)));		
								if($check){	return true; }else{	return false; }
	}
	public function insertData($table,$params){
			$k = array_keys($params);	
				foreach($k as $val){	$fields[]	= $val."=?"; 	}
						$q = $this->conn->prepare("INSERT INTO ".$table." SET ".implode(',',$fields));
							$check = $q->execute(array_values($params));		
								if($check){	return true; }else{	return false; }
	}
	public function deleteData($table,$id){
			$q = $this->conn->prepare("DELETE FROM $table WHERE id=:id");
				$q->execute(array(':id'=>$id));
					return true;	
	}	
	public function selectData($table,$index,$params){
		$k = array_keys($params);	
			foreach($k as $val){	$fields[]	= $val."=?"; 	}
				$q = $this->conn->prepare("SELECT * FROM ".$table." WHERE ".implode(' AND ',$fields));
					$q->execute(array_values($params));		
						$data = $q->fetch(PDO::FETCH_ASSOC);
							return $data[$index];	
	}
}
