<?php 
include 'inc/header.php'; 
Session::checkSession();

$totalQuestion = $exm->getTotalRows();
$getQues = $exm->getQuestions();
?>
<div class="main">
	<h1>Welcome to Online Exam</h1>

	<div style="border:1px solid #f4f4f4; margin: 0 auto; padding:20px ; width:590px ">
		<h2>Test your knowledge</h2>
		<p>This is multiple choice quiz to test your knowledge</p>
		<ul style="list-style: none">
			<li style="margin: 5px"><strong>Number of question :</strong><?= $totalQuestion; ?></li>
			<li style="margin: 5px"><strong>Question Type :</strong>MCQ</li>
		</ul>
		<a href="test.php?q=<?php echo $getQues['quesNo']?>" style="background: #f4f4A4; color: #444; border:1px solid #ddd; display: block;margin-top: 10; padding: 6px 10px; text-decoration: none; text-align: center;">Start Test</a>
	</div>
	
	 
</div>
<?php include 'inc/footer.php'; ?>