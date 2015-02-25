<?php
require_once '../includes/PDO_Connector.php';


class Model_files extends PDO_Connector{
	public function __construct(){
		$this->connect();
	}

	function view_submitted_files($student_no){
		$result = null;
		$counter = 0;
		try{
			$stmt = $this->dbh->prepare('SELECT file_name, schedule, date_submitted, description, remarks FROM tbl_submitted_files WHERE student_id = ? ORDER BY id desc');
			$stmt->bindParam(1, $student_no);
			$stmt->execute();

			while($rs = $stmt->fetch()){
				$result[$counter]['file_name'] = $rs['file_name'];
				$result[$counter]['schedule'] = $rs['schedule'];
				$result[$counter]['date_submitted'] = $rs['date_submitted'];
				$result[$counter]['description'] = $rs['description'];
				$result[$counter]['remarks'] = $rs['remarks'];

				$counter++;
			}


		}catch(Exception $e){
			print_r($e);
		}
		return $result;
		
		$this->close();
	}

	function upload_file($info){
		try{
			print_r($info);
			$sql = 'INSERT INTO tbl_submitted_files(student_id, file_name, destination, schedule, date_submitted, description) VALUES(?,?,?,?,?,?)';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $info['student_id']);
			$stmt->bindParam(2, $info['file']['name']);
			$stmt->bindParam(3, $info['destination']);
			$stmt->bindParam(4, $info['schedule']);
			$stmt->bindParam(5, $info['date_submitted']);
			$stmt->bindParam(6, $info['description']);
			$stmt->execute();
		}catch(PDOExeption $e){
			print_r($e);
		}
	}

}