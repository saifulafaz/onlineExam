<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
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
	if (isset($_GET['delque'])) {
		$quesNo = (int)$_GET['delque'];
		$deleteQues = $exm->deleteQuestion($quesNo);
	}
?>
<div class="main">
	<h1>Question List</h1>

	<?php 
		if (isset($deleteQues)) {
			echo $deleteQues;
		}
	?>
	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th>No.</th>
				<th>Question</th>
				<th>Action</th>
			</tr>
			<?php 
				$getData = $exm->getQuestionByOrder();
				if ($getData) {
					$i= 0;
					while ($result = $getData->fetch_assoc()) {
						$i++;	
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $result['ques']; ?></td>
				<td> <a onclick="return confirm('Are You sure to Remove ...?')" href="?delque=<?php echo $result['quesNo']; ?>" style="text-decoration:none">Rmove</a>
				</td>
			</tr>

		<?php } } ?>
		</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>