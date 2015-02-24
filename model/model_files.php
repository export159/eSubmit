<?php
require_once '../includes/PDO_Connector.php';


class Model_files extends PDO_Connector{
	public function __construct(){
		$this->connect();
	}

	function view_submitted_files($student_no){
		$result;
		$counter = 0;
		try{
			$stmt = $this->dbh->prepare('SELECT file_name, schedule, date_submitted, description, remarks FROM tbl_submitted_files WHERE student_id = ?');
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

}