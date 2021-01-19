<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();

	/*this method is for getting a total number of question */
	$totalQuestion = $exm->getTotalRows();

?>


<div class="main">
<h1>All Question and Answer: <?php echo $totalQuestion;?></h1>
<div class="test">
		<table> 

			<?php 
				$getQues = $exm->getQuestionByOrder();
				if ($getQues) {
					while ($question = $getQues->fetch_assoc()) {
					
			?>
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo'];?>: <?php echo $question['ques'];?></h3>
				</td>
			</tr>
			<?php 
				$number = $question['quesNo'];
				$getAns = $exm->getAnswer($number);

				if ($getAns) {
					while ($result = $getAns->fetch_assoc()) {
			?>
			<tr>
				<td>
				 <input type="radio" name="<?php echo $result['id'];?>" 
				    <?php echo ($result['rightAns']== '1') ?  "checked" : "" ;  ?>  />
			          <?php 
			          if ($result['rightAns']=='1') {
			          	echo "<span style='color:#a65959'; 'font-family:vrdana' >".$result['ans']."</span>";
			          }else{
			          	echo $result['ans'];
			          }
			          ?>
				</td>
			</tr>

			<?php } } ?>
		<?php } } ?>

			
		</table>
		<a href="starttest.php" style="background: #f4f4A4; color: #444; border:1px solid #ddd; display: block;margin-top: 10; padding: 6px 10px; text-decoration: none; text-align: center;">Start Again</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>