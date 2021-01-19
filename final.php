<?php 
include 'inc/header.php'; 
Session::checkSession();
?>
<div class="main">

		<h1>YOU ARE DONE.</h1>
	<div  style="border:1px solid #f4f4f4; margin: 0 auto; padding:20px ; width:590px ">
	<p>Congrats..! You Have Done The Test.</p>
	<p>Final Score: 
		<?php 
			if (isset($_SESSION['score'])) {
				echo $_SESSION['score'];
				unset($_SESSION['score']);
			} 
		?>
	</p><br>
	
	<a href="viewans.php" style="background: #f4f4A4; color: #444; border:1px solid #ddd; display: block;margin-top: 10; padding: 6px 10px; text-decoration: none; text-align: center;">View Answer</a>
	<br>
	<a href="starttest.php" style="background: #f4f4A4; color: #444; border:1px solid #ddd; display: block;margin-top: 10; padding: 6px 10px; text-decoration: none; text-align: center;">Start Again</a>
	</div>

</div>
<?php include 'inc/footer.php'; ?>