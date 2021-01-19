<?php include 'inc/header.php'; ?>

<?php
	
	$userid = Session::get('userid');

	if ($_SERVER['REQUEST_METHOD']=='POST') {
	$updateUser = $usr->updateUserProfile($userid, $_POST);

}
?>

<style type="text/css">
	.adminpanel{width: 500px;color: #999;margin: 30px auto 0;padding: 50px; border: 1px solid #ddd;}
</style>

<div class="main">
	<h1>Your Profile</h1>


	

	<div class="adminpanel">

	<!--update message showing-->
	<?php 
		if(isset($updateUser)){
			 echo $updateUser;
		} 
	?>
	   <form action="" method="POST">
			<?php 
				$get_user_data = $usr->get_user_data_by_id($userid);
					if ($get_user_data) {
						$result = $get_user_data->fetch_assoc();
					}
			?>
			<table class="tbl">    
				 <tr>
				   <td>Name</td>
				   <td> : </td>
				   <td><input name="name" type="text"  value="<?= $result['name'];?>"></td>
				 </tr>
				 <tr>
				   <td>Username</td>
				   <td> : </td>
				   <td><input name="username" type="text"  value="<?= $result['username']; ?>"></td>
				 </tr>
				 <tr>
				   <td>E-mail</td>
				   <td> : </td>
				   <td><input name="email" type="text"  value="<?= $result['email']; ?>"></td>
				 </tr>
				 
				  <tr>
				  <td></td>
				  <td></td>
				   <td>
				   	  <input  style="background-color: #a65959; color: white"  type="submit" value="Update Profile">
				   </td>
				 </tr>
	       </table>
		 </form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>

