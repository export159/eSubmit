<?php
require_once '../includes/PDO_Connector.php';


class Model_files extends PDO_Connector{
	public function __construct(){
		$this->connect();
	}

	function view_submitted_files($student_no){
		$result = null;
		$counter = 0;
		$stmt = null;
		try{
			if($_SESSION['type'] == 'teacher'){
				$stmt = $this->dbh->prepare('SELECT f.id, s.first_name, s.middle_name, s.last_name, f.file_name, f.schedule, f.date_submitted, f.description, f.remarks FROM tbl_submitted_files as f, tbl_student as s WHERE f.student_id = s.student_no ORDER BY s.last_name asc');
			}else if($_SESSION['type'] == 'student'){
				$stmt = $this->dbh->prepare('SELECT id, file_name, schedule, date_submitted, description, remarks FROM tbl_submitted_files WHERE student_id = ? ORDER BY id desc');
				$stmt->bindParam(1, $student_no);
			}
			
			$stmt->execute();
			/*
			while($rs = $stmt->fetch()){
				$result[$counter]['id'] = $rs['id'];
				$result[$counter]['file_name'] = $rs['file_name'];
				$result[$counter]['schedule'] = $rs['schedule'];
				$result[$counter]['date_submitted'] = $rs['date_submitted'];
				$result[$counter]['description'] = $rs['description'];
				$result[$counter]['remarks'] = $rs['remarks'];

				$counter++;
			}
			*/

		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		//return $result;
		
	}
	function get_file_where_id($id){
		try{
			$sql = 'SELECT destination FROM tbl_submitted_files WHERE id = ?';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $id);
			$stmt->execute();

			$rs = $stmt->fetch();

			return $rs['destination'];
		}catch(PDOExeption $e){
			print_r($e);
		}
	}

	function upload_file($info){
		try{
			echo 'model_files';
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

	function replace_file($file){

	}

	function remove_file($id){
		try{
			$sql = 'DELETE FROM tbl_submitted_files WHERE id = ?';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $id);
			$stmt->execute();
		}catch(PDOException $e){
			print_r($e);
		}
	}


	//adding remarks
	function add_remarks($data){
		try{
			$sql = 'UPDATE tbl_submitted_files SET remarks = ? WHERE id = ?';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $data['remarks']);
			$stmt->bindParam(2, $data['id']);
			$stmt->execute();
		}catch(PDOException $e){
			print_r($e);
		}
	}

}