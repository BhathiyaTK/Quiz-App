<?php 

require_once 'db.php'; 

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		if (($email!=='')&&($password!=='')) {
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$result = $conn->query($query);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$_SESSION['id'] = $row['id'];
					$_SESSION['name'] = $row['first_name'];
					$_SESSION['email'] = $row['email'];

					header("location: quiz.php");
				}
			}else{
				$log_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>User not found!</strong> Please enter correct details to login.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}
		}else{
			$log_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Access denited!</strong> All fields are required.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}
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
	<title>LOGIN | Quiz Web Application</title>
</head>
<body>
	<section id="login-section">
		<div class="login-content">
			<div class="app-title">
				<h1>Quiz Web Application</h1>
			</div>
			<div class="user-login-icon">
				<img src="images/user.png">
			</div>
			<div class="login-form-div">
				<form action="index.php" method="POST">
					<input type="text" name="email" id="email" placeholder="E-mail">
					<input type="password" name="password" id="password" placeholder="Password">
					<input type="submit" name="login" id="login-btn" value="LOG IN">
					<div class="reg-link">
						New around here! Click <a href="reg.php">here</a> to join.
					</div>
				</form>
			</div>
			<br>
			<div class="log_msg_div">
				<?php
				if (isset($log_msg)) {
					echo $log_msg;
				}
				?>
			</div>
		</div>
	</section>
</body>
</html>