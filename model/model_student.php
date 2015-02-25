<?php
require_once '../includes/PDO_Connector.php';

class Model_student extends PDO_Connector{

	function login($student_id){
		$this->connect();
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

	function add_student($data){
		$this->connect();
		try{
			$sql = 'INSERT INTO tbl_student VALUES(0,?,?,?,?)';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $data['student_number']);
			$stmt->bindParam(2, $data['first_name']);
			$stmt->bindParam(3, $data['middle_name']);
			$stmt->bindParam(4, $data['last_name']);
			$stmt->execute();
			
		}catch(PDOException $e){
			print_r($e);
		}
		return true;

		$this->close();
	}

	function getStudent($student_id){
		$this->connect();
		$result = null;
		try{
			$sql = 'SELECT first_name, middle_name, last_name FROM tbl_student WHERE student_no = ?';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $student_id);
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
