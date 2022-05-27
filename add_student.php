<?php
error_reporting(0);
session_start();
session_destroy();

	include 'connection.php';

	if(isset($_POST['addStudent']))
	{
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$userType = 'student';
		$password = $_POST['password'];

			// avoiding duplicate user
		$uniqe_User = "SELECT * FROM user WHERE user = '$name'";
		$checkUser = mysqli_query($con,$uniqe_User);
		$row_count = mysqli_num_rows($checkUser);

		if($row_count==1)
		{
			echo "<script type='text/javascript'>
						alert('User already exist. Please try another Name');
					 </script>";

		}
		else
		{

			$sql = "INSERT INTO user(user, phone, email, usertype, password) 
			VALUES ('$name','$phone','$email','$userType','$password')";

			$res = mysqli_query($con,$sql);
			if($res)
			{
				echo "<script type='text/javascript'>
						alert('Data Inserted successfully..!');
					 </script>";
				header('location:view_student.php');
			}
			else
			{
				echo "Insertion Failed";
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Student</title>
	<!-- CDN  BOOTSTRAP-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<style type="text/css">

		.formDiv
		{
			background: skyblue;
			width: 350px;
			padding: 10px;
		}
/*		.contents
		{
			background-image: url('img (4).jpg');
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			height: 100%;

		}*/
		.addStu
		{
			display: inline-block;
			text-align: right;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
			padding-right: 10px;
		}
		.inpTex
		{
			padding-left: 7px;
		}
	</style>
</head>
	<body>
	 <?php
	  include 'admin_sidebar.php';

	 ?>

	<div class="contents">
		<center>
			<h3>Add Students</h3>
			<div class="formDiv">
				<form action="#" method="POST">
					<div>
						<label class="addStu">User</label>
						<input class="inpTex" type="text" name="name">
					</div>
					<div>
						<label class="addStu">Phone</label>
						<input class="inpTex" type="text" name="phone">
					</div>
					
					<div>
						<label class="addStu">Email</label>
						<input  class="inpTex" type="email" name="email">
					</div>
					<div>
						<label class="addStu">Password</label>
						<input class="inpTex" type="password" name="password">
					</div>
					<div>
						<input class="btn btn-success" type="submit" name="addStudent">
					</div>
					
					
				</form>
			</div>
		</center>
		
	</div>

	</body>
</html>