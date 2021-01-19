<?php 

	$fileLocation = realpath(dirname(__FILE__));
	include_once($fileLocation.'/classes/User.php');
	$usr = new User();

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$upN = $_POST['n'];
	$upUn = $_POST['un'];
	$upMail = $_POST['m'];

	$updateUser = $usr->updateUserProfile($upN, $upUn, $upMail);

}

	// if ($_SERVER['REQUEST_METHOD']=='POST') {
 //    	$name = $_POST['name'];
 //    	$username = $_POST['username'];
 //    	$password = $_POST['password'];
 //    	$email = $_POST['email']; 

 //    	$user_regi = $usr->user_registration($name,$username,$password,$email);
 //  	 }