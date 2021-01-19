<?php include 'inc/header.php'; ?>

<?php 
	if (isset($_GET['q'])) {
		$number =$_GET['q'];
	}else{
		header("Location:exam.php");
	}
/*this method is for getting a specific question */
	$question = $exm->getQuestionByNumber($number);

/*this method is for getting a total number of question */
	$totalQuestion = $exm->getTotalRows();

?>

<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$process = $pro->processData($_POST);
	}
?>
<div class="main">
<h1>Question <?php echo $question['quesNo'];?> of <?php echo $totalQuestion;?></h1>
<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo'];?>: <?php echo $question['ques'];?></h3>
				</td>
			</tr>
			<?php 
				$getAns = $exm->getAnswer($number);

				if ($getAns) {
					while ($result = $getAns->fetch_assoc()) {
			?>
			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result['id'];?>" /><?php echo $result['ans'];?>
				</td>
			</tr>

		<?php } } ?>

			<tr>
			    <td>
					<input type="submit" name="submit" value="Next Question"/>
					<input type="hidden" name="number" value="<?php echo $number;?>"/>
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>
<?php include 'inc/footer.php'; ?>