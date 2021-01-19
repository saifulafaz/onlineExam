<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

class Exam{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	

	public function add_questions($data){
		$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
		$ques = mysqli_real_escape_string($this->db->link, $data['ques']);

		$ans = array();
		$ans[1]=$data['ans1'];
		$ans[2]=$data['ans2'];
		$ans[3]=$data['ans3'];
		$ans[4]=$data['ans4'];

		$rightAnswer = $data['rightAns'];
		$query = "INSERT INTO tbl_ques(quesNo,queS) VALUES ('$quesNo','$ques')";
		$insert_row = $this->db->insert($query);
		if ($insert_row) {
			foreach ($ans as $key => $answer) {
				if ($answer !='') {
					if ($rightAnswer==$key) {
						$rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$answer')";
					}else{
						$rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','0','$answer')";
					}

					$insertrow = $this->db->insert($rquery);
					if ($insertrow) {
						continue;
					}else{
						die('Error...');
					}
				}
			}

			$msg = "<span class='success'>QUESTION ADDED SUCCESSFULLY..!!!</span>";
			return $msg;
		}

	}

	public function getQuestionByOrder(){
		$query = "SELECT * FROM tbl_ques order by quesNo ASC";
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteQuestion($quesNo){
		$tables = $arrayName = array("tbl_ques","tbl_ans");

		foreach ($tables as $table) {
			$query = "DELETE FROM $table WHERE quesNo='$quesNo'";
			$deldata = $this->db->delete($query);
		}
			if ($deldata) {
			$msg ="<span class='error'>Question Deleted Successfully</span>";
			return $msg;
		}else{
			$msg ="<span class='error'>Question Not Deleted !</span>";
			return $msg;
		}
		
	}

	public function getTotalRows(){
		$query = "SELECT * FROM tbl_ques";
		$result = $this->db->select($query);
		$total =$result->num_rows;
		return $total;
	}

	public function getQuestions(){
		$query = "SELECT * FROM tbl_ques";
		$getdata = $this->db->select($query);
		$result =$getdata->fetch_assoc();
		return $result;
	}

	public function getQuestionByNumber($number){
		$query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
		$getdata = $this->db->select($query);
		$result =$getdata->fetch_assoc();
		return $result;
	}

	public function getAnswer($number){
		$query = "SELECT * FROM tbl_ans WHERE quesNo ='$number'";
		$getdata = $this->db->select($query);
		return $getdata;
	}
}
?>