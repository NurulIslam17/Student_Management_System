<?php
	error_reporting(0);
	session_start();

	include 'connection.php';
	$updateID = $_GET['update'];
	$sql = "SELECT * FROM user where id = '$updateID'";
	$res = mysqli_query($con,$sql);
	$data = $res->fetch_assoc();

	if(isset($_POST['updateStudent']))
	{
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sqlUpdate = "UPDATE user SET user='$name',phone='$phone',email='$email',password='$password' WHERE id ='$updateID'";
		$upDB = mysqli_query($con,$sqlUpdate);

		if($upDB)
		{
			echo "<script type='text/javascript'>
				   alert('Data Updated successfully..!');
				  </script>";	
			header('location:view_student.php');
		}
		else
		{
			echo "Updation Failed Failed";
		}	
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admission</title>
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
			<h3>Update Students</h3>
			<div class="formDiv">
				<form action="#" method="POST">
					<div>
						<label class="addStu">User</label>
						<input class="inpTex" type="text" name="name" value="<?php echo "{$data['user']}";  ?>">
					</div>
					<div>
						<label class="addStu">Phone</label>
						<input class="inpTex" type="text" name="phone" value="<?php echo "{$data['phone']}";  ?>">
					</div>
					
					<div>
						<label class="addStu">Email</label>
						<input  class="inpTex" type="email" name="email" value="<?php echo "{$data['email']}";  ?>"> 
					</div>
					<div>
						<label class="addStu">Password</label>
						<input class="inpTex" type="password" name="password" value="<?php echo "{$data['password']}";  ?>">
					</div>
					<div>
						<input class="btn btn-success" type="submit" value="Update" name="updateStudent">
					</div>
					
					
				</form>
			</div>
		</center>
		
	</div>

	</body>
</html>