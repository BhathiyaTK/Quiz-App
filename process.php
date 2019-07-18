<?php
require_once 'db.php';

session_start();

if (isset($_SESSION['email'])) {
	if ($_SESSION['email'] == '') {
		header("location: index.php");
	}else{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST["marks_check"])) {
				$q1 = $_POST["radio-stacked1"];
				$q2 = $_POST["radio-stacked2"];
				$q3 = $_POST["radio-stacked3"];
				$q4 = $_POST["radio-stacked4"];
				$q5 = $_POST["radio-stacked5"];
				// foreach ($_SESSION['q_id'] as $key => $value) {
				// 	$q_id = $value;
				// }
				// $mark_sql = "SELECT * FROM questions"
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Vehicle Booking System - SUSL">
	<meta name="keywords" content="HTML5, CSS3, Bootstrap, JQuery, PHP, MySQL">
	<meta name="author" content="Bhathiya Kariyawasam">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- Javascipt -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>

	<!-- Title -->
	<title>QUIZ | Quiz Web Application</title>
</head>
<body>
	<section id="mark-section">
		<div class="result-div">
			<div class="result-title-div">
				<h2>Your Results</h2>
			</div>
			<div class="all-results">
				<table class="table table-bordered table-hover">
					<thead>
						<th class="center">#</th>
						<th class="center">Question</th>
						<th class="center">Your Answer</th>
						<th class="center">Correct Answer</th>
						<th class="center">Answer Status</th>
					</thead>
					<tbody>
						<?php
						$i=1; $q='q';
						foreach ($_SESSION['q_id'] as $key => $value){
							$qw = $value['id'];
							$sql1 = "SELECT * FROM questions WHERE id='$qw'";
							$sql1_rslt = mysqli_query($conn,$sql1);
							$row1 = mysqli_fetch_array($sql1_rslt);
							?>
							<tr>
								<td class="center"><?php echo $i; ?></td>
								<td><?php echo $row1["question"]; ?></td>
								<td class="center">
								<?php 
									$a = $q.$i;
									if ($a == 'q1') {
									 	echo $q1;
									}elseif ($a == 'q2') {
										echo $q2;
									}elseif ($a == 'q3') {
										echo $q3;
									}elseif ($a == 'q4') {
										echo $q4;
									}elseif ($a == 'q5') {
										echo $q5;
									}
								?>	
								</td>
								<td class="center"><?php echo $row1["correct_answer"]; ?></td>
								<td class="center">
									<?php
									if ($a == 'q1') {
										if ($q1 == $row1["correct_answer"]) { ?>
											<span class="badge badge-success" style="font-size: 14px; padding: 7px 10px;">Correct</span>
										<?php
										}else{ ?>
											<span class="badge badge-danger" style="font-size: 14px; padding: 7px 10px;">Incorrect</span>
										<?php
										}
									}elseif ($a == 'q2') {
										if ($q2 == $row1["correct_answer"]) { ?>
											<span class="badge badge-success" style="font-size: 14px; padding: 7px 10px;">Correct</span>
										<?php
										}else{ ?>
											<span class="badge badge-danger" style="font-size: 14px; padding: 7px 10px;">Incorrect</span>
										<?php
										}
									}elseif ($a == 'q3') {
										if ($q3 == $row1["correct_answer"]) { ?>
											<span class="badge badge-success" style="font-size: 14px; padding: 7px 10px;">Correct</span>
										<?php
										}else{ ?>
											<span class="badge badge-danger" style="font-size: 14px; padding: 7px 10px;">Incorrect</span>
										<?php
										}
									}elseif ($a == 'q4') {
										if ($q4 == $row1["correct_answer"]) { ?>
											<span class="badge badge-success" style="font-size: 14px; padding: 7px 10px;">Correct</span>
										<?php
										}else{ ?>
											<span class="badge badge-danger" style="font-size: 14px; padding: 7px 10px;">Incorrect</span>
										<?php
										}
									}elseif ($a == 'q5') {
										if ($q5 == $row1["correct_answer"]) { ?>
											<span class="badge badge-success" style="font-size: 14px; padding: 7px 10px;">Correct</span>
										<?php
										}else{ ?>
											<span class="badge badge-danger" style="font-size: 14px; padding: 7px 10px;">Incorrect</span>
										<?php
										}
									}
									?>
									
								</td>
							</tr>
						<?php
						$i++;
						}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section>
</body>
</html>

<?php
	}
}else{
	header("location: index.php");
}
?>