<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/classes/User.php');
	$usr = new User();
	
	// spl_autoload_register(function($class){
	// include_once "classes/".$class.".php";
	



	if ($_SERVER['REQUEST_METHOD']=='POST') {
    	$name = $_POST['name'];
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$email = $_POST['email']; 

    	$user_regi = $usr->user_registration($name,$username,$password,$email);
    	 }


?>