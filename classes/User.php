<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Session.php');
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
//session_start();

class User{

	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function user_registration($name,$username,$password,$email){
		$name = $this->fm->validation($name);
		$username = $this->fm->validation($username);
		$password = $this->fm->validation($password);
		$email = $this->fm->validation($email);

		$name = mysqli_real_escape_string($this->db->link,$name);
		$username = mysqli_real_escape_string($this->db->link,$username);
		// $password = mysqli_real_escape_string($this->db->link, md5($password));
		$email = mysqli_real_escape_string($this->db->link, $email);

		if ($name ==""||$username ==""||$password ==""||$email =="") {
			echo "<span class='error'>Fields Must not be Empty !</span>";
			exit();
		}elseif (filter_var($email, FILTER_VALIDATE_EMAIL)===FALSE) {
			echo "<span class='error'>Invalid Email Address !</span>";
			exit();
		}else{
			$check_email = "SELECT * FROM tbl_user WHERE email ='$email'";
			$find_email = $this->db->select($check_email);
			if ($find_email != FALSE) {
				echo "<span class='error'>Email Address Already Exist!</span>";
				exit();
			exit();
			}else{
				$password = mysqli_real_escape_string($this->db->link, md5($password));
				$query = "INSERT INTO tbl_user(name,username,password,email) VALUES('$name','$username','$password','$email')";
				$inserted_row = $this->db->insert($query);
				if ($inserted_row) {
					echo "<span class='suuccess'>Registration Successful..!</span>";
					exit();
				}else{
					echo "<span class='error'>Error... Not register!</span>";
				}
			}
		}
		
	}

	/*==============
	user login
	===============*/

	public function userLogin($email, $password){
		$email = $this->fm->validation($email);
		$password = $this->fm->validation($password);

		$email = mysqli_real_escape_string($this->db->link, $email);
		$password = mysqli_real_escape_string($this->db->link, $password);

		if ($email ==""||$password=="") {
			echo "empty";
			exit();
		}else{
			$query = "SELECT * FROM tbl_user WHERE email = '$email' AND password='$password'";
			$result = $this->db->select($query);
			if ($result != FALSE) {
				$value = $result->fetch_assoc();
				if ($value['status']=='1') {
					echo "disabled";
					exit();
				}else{
					Session::init();
					Session::set("login",true);
					Session::set("userid",$value['userId']);
					Session::set("name",$value['name']);
					Session::set("username",$value['username']);
				}
			}else{
				echo "error";
				exit();
			}
		}
		
	}

/*For front end SINGLE user data show*/
	public function get_user_data_by_id($userid){
		$query = "SELECT * FROM tbl_user WHERE userId = '$userid'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllUser(){
		$query = "SELECT * FROM tbl_user order by userId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function disableUser($userid){
		$query = "UPDATE tbl_user
				SET
				status ='1'
				WHERE 
				userId = '$userid'";
		$updated_row = $this->db->update($query);
		//return $result;

		if ($updated_row) {
			$msg ="<span class='success'>User Disabled</span>";
			return $msg;
		}else{
			$msg ="<span class='error'>User Not Disable</span>";
			return $msg;
		}
	}


	public function enableUser($userid){
		$query ="UPDATE tbl_user
				SET
				status='0'
				WHERE 
				userId = '$userid'";
		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg ="<span class='success'>User Enable</span>";
			return $msg;
		}else{
			$msg ="<span class='error'>User Not Enable</span>";
			return $msg;
		}
		
	}


	public function deleteUser($userid){
		$query = "DELETE 
				 FROM tbl_user
		 		 WHERE 
		 		 userId = '$userid'";

		$deleted_row =$this->db->delete($query);

		if ($deleted_row) {
			$msg ="<span class='error'>User Removed</span>";
			return $msg;
		}else{
			$msg ="<span class='error'>User Not Removed</span>";
			return $msg;
		}
	}



	public function updateUserProfile($userid, $data){
		$name = $this->fm->validation($data['name']);
		$username = $this->fm->validation($data['username']);
		$email = $this->fm->validation($data['email']);


		$name = mysqli_real_escape_string($this->db->link,$name);
		$username = mysqli_real_escape_string($this->db->link,$username);
		$email = mysqli_real_escape_string($this->db->link, $email); 
		if ($name ==""||$username ==""||$email =="") {
			$msg= "<span class='error'>Fields Must not be Empty !</span>";
			return $msg;
			exit();
		}else{
		$query = "UPDATE tbl_user 
					SET 
					name='$name',
					username='$username',
					email='$email'
					WHERE userId = '$userid'";
				$inserted_row = $this->db->update($query);
			
				if ($inserted_row) {
					$msg = "<span class='suuccess'>User Profile Updated Successful..!</span>";
					return $msg;
					exit();
				}else{
					$msg ="<span class='error'>Error... Not Profile Updated!</span>";
					return $msg;
					exit();
				}
			}
		
	}

	
}
?>