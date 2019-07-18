<?php 

require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['join'])) {
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email = $_POST["email"];
		$password = md5($_POST["reg_pass"]);
		$conf_password = md5($_POST["reg_conf_pass"]);

		if (($first_name!=='')&&($last_name!=='')&&($email!=='')&&($password!=='')&&($conf_password!=='')) {
			if ($password == $conf_password) {
				$sql = "INSERT INTO users(first_name,last_name,email,password,confirm_password) VALUES('$first_name','$last_name','$email','$password','$conf_password')";
				if ($conn->query($sql)) {
					$msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>You joined with QuizApp successfully.</strong> Please login to continue.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				}else{
					$msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Process failed.</strong> Database connection failed.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				}
			}else{
				$msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Passwords are not equal.</strong> Please enter same passwords in both password fields.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}
		}else{
			$msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops!</strong> All fields are required.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
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
	<title>JOIN | Quiz Web Application</title>
</head>
<body>
	<section id="reg-section">
		<div class="reg-bg-blur">
			<div class="reg-content">
				<div class="reg-title">
					<h1>Join with Us</h1>
				</div>
				<div class="reg-form-content">
					<form action="reg.php" method="POST">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="first_name" id="first_name" placeholder="First Name">
							</div>
							<div class="col-md-6">
								<input type="text" name="last_name" id="last_name" placeholder="Last Name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="email" name="email" id="email" placeholder="Email">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<input type="password" name="reg_pass" id="reg_password" placeholder="Password">
							</div>
							<div class="col-md-6">
								<input type="password" name="reg_conf_pass" id="reg_conf_password" placeholder="Re-enter Password">
							</div>
						</div>
						<div class="reg-btn-div">
							<input type="submit" name="join" value="JOIN" id="reg-btn">
						</div>
						<div class="login-link">
							Already joined! Click <a href="index.php">here</a> to login.
						</div>
					</form>
				</div>
				<div class="reg_msg_div">
					<?php
					if (isset($msg)) {
						echo $msg;
					}
					?>
				</div>
			</div>
		</div>
	</section>
</body>
</html>