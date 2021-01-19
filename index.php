<?php include 'inc/header.php'; ?>

<?php
	
Session::checkLogin();
?>

<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="POST">
		<table class="tbl">    
			 <tr>
			   <td>E-mail</td>
			   <td><input name="email" type="text" id="email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <br>
	   <span class="empty" style="color: red; display: none">Field Must Not Be Empty !</span>
	   <span class="error" style="color: red; display: none">Email Or Password Not Matched !</span>
	   <span class="disable" style="color: red; display: none">User ID Disabled !</span>
	   
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>