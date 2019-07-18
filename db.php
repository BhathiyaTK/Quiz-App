<?php

$host = "localhost";
$db_name = "root";
$db_pass = "";
$db = "quizapp";

$conn = new mysqli($host,$db_name,$db_pass,$db);

if ($conn->connect_error) {
	die("Connection Failed: ".$conn->connect_error);
}

?>