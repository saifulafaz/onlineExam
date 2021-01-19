<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usr = new User();
?>
<?php
  // Session::checkLogin();
?>
<style type="text/css">
	.adminpanel{
		width: 500px;
		color: #999;
		margin: 30px auto 0;
		padding: 50px;
		border: 1px solid #ddd;
	}
</style>

<?php 
	if (isset($_GET['dis'])) {
		$dblid = (int)$_GET['dis'];
		$dblUser = $usr->disableUser($dblid);
	}
 
	if (isset($_GET['ena'])) {
		$eblid = (int)$_GET['ena'];
		$eblUser = $usr->enableUser($eblid);
	}

	if (isset($_GET['del'])) {
		$delid = (int)$_GET['del'];
		$delUser = $usr->deleteUser($delid);
	}
?>
<div class="main">
	<h1>Manage User</h1>

	<?php 
		if (isset($dblUser)) {
			echo $dblUser;
		}

		if (isset($eblUser)) {
			echo $eblUser;
		}
		if (isset($delUser)) {
			echo $delUser;
		}
	?>
	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Username</th>
				<th>E-mail</th>
				<th>Action</th>
			</tr>
			<?php 
				$userData = $usr->getAllUser();
				if ($userData) {
					$i= 0;
					while ($result = $userData->fetch_assoc()) {
						$i++;	
			?>
			<tr>
				<td>
					<?php 
						if ($result['status']=='1') { 
							echo "<span class='error'>".$i."</span>";
						}else{ 
							echo $i; 
						}
					?>	
				</td>
				<td><?php echo $result['name']; ?></td>
				<td><?php echo $result['username']; ?></td>
				<td><?php echo $result['email']; ?></td>
				<td>
					<?php if ($result['status']=='0') { ?>
						<a onclick="return confirm('Are You sure to Disable')" href="?dis=<?php echo $result['userId']; ?>" style="text-decoration:none">Disable</a> 
					<?php }else{?>
					<a onclick="return confirm('Are You sure to Enable')" href="?ena=<?php echo $result['userId']; ?>" style="text-decoration:none">Enable</a>
					<?php }?>
						|| <a onclick="return confirm('Are You sure to Remove')" href="?del=<?php echo $result['userId']; ?>" style="text-decoration:none">Rmove</a>
				</td>
			</tr>

		<?php } } ?>
		</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>