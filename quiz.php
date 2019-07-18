<?php

require_once 'db.php';

session_start();

if (isset($_SESSION['email'])) {
	if ($_SESSION['email'] == '') {
		header("location: index.php");
	}else{
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
	<section id="quiz-section">
		<div class="logout-btn-div">
			<span><b>EMAIL :</b> <?php echo $_SESSION["email"]; ?></span>
			<a href="logout.php">Log out</a>
		</div>
		<div class="quiz-title">
			<h1>Enhance Your Knowledge</h1>
			Knowledge is the power and power corrupts
		</div>
		<form action="process.php" method="POST">
			<?php
			$sql_qs = "SELECT * FROM questions ORDER BY RAND() LIMIT 5";
			$sql_qs_rslt = mysqli_query($conn,$sql_qs);
			$q_num = 0;
			$cont_num = 0;
			$id_num = 0;
			//$array[] = array();
			//$rq = mysqli_fetch_assoc($sql_qs_rslt);

			while($row = mysqli_fetch_array($sql_qs_rslt)){
				$array[] = array("id" => $row['id']);
				$_SESSION['q_id'] = $array; 
			?>
			<div class="quiz-container" id="<?php echo $row['id']; ?>">
				<div class="question">
					<h3>Question <?php echo $q_num += 1; ?></h3>
					<p>
						<?php echo $row["question"]; ?>
					</p>
				</div>
				<div class="answers">
					<div class="custom-control custom-radio">
						<input type="radio" id="<?php echo 'customRadio1'.$row['id'] ?>" name="<?php echo 'radio-stacked'.$q_num; ?>" class="custom-control-input" value="<?php echo $row['one']; ?>">
						<label class="custom-control-label" for="<?php echo 'customRadio1'.$row['id'] ?>"><?php echo $row["one"]; ?></label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="<?php echo 'customRadio2'.$row['id'] ?>" name="<?php echo 'radio-stacked'.$q_num; ?>" class="custom-control-input" value="<?php echo $row['two']; ?>">
						<label class="custom-control-label" for="<?php echo 'customRadio2'.$row['id'] ?>"><?php echo $row["two"]; ?></label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="<?php echo 'customRadio3'.$row['id'] ?>" name="<?php echo 'radio-stacked'.$q_num; ?>" class="custom-control-input" value="<?php echo $row['three']; ?>">
						<label class="custom-control-label" for="<?php echo 'customRadio3'.$row['id'] ?>"><?php echo $row["three"]; ?></label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="<?php echo 'customRadio4'.$row['id'] ?>" name="<?php echo 'radio-stacked'.$q_num; ?>" class="custom-control-input" value="<?php echo $row['four']; ?>">
						<label class="custom-control-label" for="<?php echo 'customRadio4'.$row['id'] ?>"><?php echo $row["four"]; ?></label>
					</div>
				</div>
			</div>
			<?php
			}
			?>
			<div class="buttons">
				<input type="submit" name="marks_check" id="marks_check" value="Check Marks">
			</div>
		</form>
	</section>
	<script type="text/javascript">
		$(function(){
			$(".next-btn").click(function(e){
				e.preventDefault();
				var btn_id = $(".next-btn").attr('id');
				$("#container"+[i+1]).show();
			});
		});
	</script>
</body>
</html>

<?php
	}
}else{
	header("location: index.php");
}
?>