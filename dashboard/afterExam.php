<?php

	session_start();
	//include("connection.php");
	$url='localhost';
	$username = "root";
	$password = "";
	$dbname = "hackathon";
	$conn = mysqli_connect($url, $username, $password, $dbname);

	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	$JobapcId = 1001;   //= $_SESSION['jobseekerid'];
	$examid = 1;  //= $_SESSION['examid'];

	echo "<h1><i>You have successfully completed your exam:</i></h1>";

	echo '<!DOCTYPE html>
		<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<style>
		</style>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Online Examination</title>
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/git.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 
	</head>
	<body>';

	echo ' <div class="container">         
  <table class="table table-responsive table-hover table-bordered">
  <caption>List of Questions and Answers submitted by '.$JobapcId.'</caption>
    <thead>
      <tr>
        <th>Question No</th>
        <th>Question</th>
        <th>Answer</th>
      </tr>
    </thead>
   <tbody>';


	$sql="select  a.QuestionID, q.Question, a.Answer from questions q, answers a where q.QuestionID=a.QuestionID and JobseekerID = '$JobapcId' and ExamID = '$examid'";

	$res = mysqli_query($conn,$sql);

		while($row=mysqli_fetch_array($res)){

				echo '<tr>
        		<td>'.$row[0].'</td>
        		<td>'.$row[1].'</td>
        		<td>'.$row[2].'</td>
     			</tr>';
		}

	echo ' 
		</tbody>
		</table>
    	</div>';

    	//select  a.QuestionID, q.Question, a.Answer from question q, answers a where q.QuestionID=a.QuestionID and JobseekerID = '$JobapcId' and ExamID = '$examid';

?>

