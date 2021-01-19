<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();

  // Session::checkLogin();
?>

<style type="text/css">
	.adminpanel{width: 680px;color: #999;margin: 20px auto 0;padding: 10px;border: 1px solid #ddd;}
	input[type="text"]{border: 1px solid #ddd;margin-bottom: 10px;padding: 5px;width: 500px;}
	input[type="number"]{border: 1px solid #ddd; margin-bottom: 10px;padding: 5px;width: 100px}
</style>


<?php
  // Session::checkLogin();

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$addQuestion = $exm->add_questions($_POST);
}

$total = $exm->getTotalRows();
$next = $total+1;
?>

<div class="main">
<h1>Add Question</h1>
<?php 
if (isset($addQuestion)) {
	echo $addQuestion;
}
?>
	<div class="adminpanel">
		<form action="" method="post">
			<table>
				<tr>
					<td>Qustion No</td>
					<td>:</td>
					<td> <input type="number" name="quesNo" value="<?= $next; ?>" readonly></td>
				</tr>
				<tr>
					<td>Qustion</td>
					<td>:</td>
					<td> <input type="text" name="ques"></td>
				</tr>
				<tr>
					<td>Choice One</td>
					<td>:</td>
					<td> <input type="text" name="ans1"></td>
				</tr>
				<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td> <input type="text" name="ans2"></td>
				</tr>
				<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td> <input type="text" name="ans3"></td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td> <input type="text" name="ans4"></td>
				</tr>
				<tr>
					<td>Correct No.</td>
					<td>:</td>
					<td> <input type="number" name="rightAns"></td>
				</tr>
				<tr>
					<td align="right" colspan="3"> <input type="submit" value="Add Question"></td>
				</tr>
			</table>
		</form>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>