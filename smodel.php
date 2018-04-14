<?php 
include "db.php";
class Model{

	public function __construct(){

	}

	public function gtStudentData(){

		$sql = 'SELECT * FROM tbl_client';
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}	
}
?>
