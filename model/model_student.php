<?php
require_once '../includes/PDO_Connector.php';

class Model_student extends PDO_Connector{
	public function __construct(){
		$this->connect();
	}

	function login($student_id){
		$id;
		try{
			$sql = 'SELECT student_no FROM tbl_student WHERE student_no = ?';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $student_id);
			$stmt->execute();

			while($rs = $stmt->fetch()){
				$id = $rs['student_no'];
			}
		}catch(Exception $e){
			print_r($e);
		}

		return $id;

		$this->close();
	}

}
