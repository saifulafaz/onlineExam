<?php include 'inc/header.php'; ?>

<?php
  Session::checkLogin();
?>

<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="POST">
  		  <table>
    		    <tr>
                 <td>Name</td>
                 <td><input type="text"  id="name"></td>
            </tr>
  		      <tr>
               <td>Username</td>
               <td><input type="text" id="username"></td>
           </tr>
           <tr>
               <td>Password</td>
               <td><input type="password" id="password"></td>
           </tr>
           <tr>
               <td>E-mail</td>
               <td><input type="text"    id="email"></td>
           </tr>
           <tr>
               <td></td>
               <td><input type="submit" id="registration" value="Signup"></td>
           </tr>
        </table>
	</form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
     <span id='state'></span>
	</div>



	
</div>
<?php include 'inc/footer.php'; ?>