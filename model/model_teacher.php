<?php
require_once '../includes/PDO_Connector.php';

class Model_teacher extends PDO_Connector{
	public function __construct(){
		$this->connect();
	}
	function login($teacher_id){
		$id = null;
		try{
			$sql = 'SELECT teacher_no FROM tbl_teachers WHERE teacher_no = ?';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $teacher_id);
			$stmt->execute();

			while($rs = $stmt->fetch()){
				$id = $rs['teacher_no'];
			}
		}catch(Exception $e){
			print_r($e);
		}
		return $id;

		$this->close();
	}

	function add_teacher($data){
		try{
			if($this->getTeacher($data['number']) == null){
				$sql = 'INSERT INTO tbl_teachers VALUES(0,?,?,?,?)';
				$stmt = $this->dbh->prepare($sql);
				$stmt->bindParam(1, $data['number']);
				$stmt->bindParam(2, $data['first_name']);
				$stmt->bindParam(3, $data['middle_name']);
				$stmt->bindParam(4, $data['last_name']);
				$stmt->execute();

				return true;
			}else{
				return false;
			}
			
		}catch(PDOException $e){
			print_r($e);
		}
		

		$this->close();
	}

	function getTeacher($teacher_id){
		$result = null;
		try{
			$sql = 'SELECT first_name, middle_name, last_name FROM tbl_teachers WHERE teacher_no = ?';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $teacher_id);
			$stmt->execute();

			while($rs = $stmt->fetch()){
				$result['first_name'] = $rs['first_name'];
				$result['middle_name'] = $rs['middle_name'];
				$result['last_name'] = $rs['last_name'];
			}
		}catch(PDOException $e){
			print_r($e);
		}

		return $result;

		$this->close();
	}

}
