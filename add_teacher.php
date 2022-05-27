<?php
	session_start();

	include 'connection.php';

	if(isset($_REQUEST['add_teacher']))
	{
		$tc_name = $_REQUEST['teacher'];
		$tc_email = $_REQUEST['email'];
		$tc_desc = $_REQUEST['desc'];
		$tc_img= $_FILES['img']['name'];

		$dest = "./images/".$tc_img;
		$dest_db = "./images/".$tc_img;
		move_uploaded_file($_FILES['img']['tmp_name'], $dest);

		$sql = "INSERT INTO teachers(teacherName, email, des, image) VALUES ('$tc_name','$tc_email','$tc_desc','$dest_db')";
		$res = mysqli_query($con,$sql);

		if($res)
		{
			header('location:view_teacher.php');
		}
		else
		{
			echo "Insertion Failed";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Teacher</title>
	<!-- CDN  BOOTSTRAP-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">

	<style type="text/css">
		label
		{
			display: inline-block;
			text-align: right;
			width: 150px;
			padding-right: 5px;
		}
		.inpLeb
		{
			padding-bottom: 10px;
		}

		.formDiv
		{
			background-color: skyblue;
			width:600px;
			padding: 15px;
		}
	</style>
</head>
	<body>
	 <?php
	  include 'admin_sidebar.php';

	 ?>
	<div class="contents">
		<center>
			<h2>Add Teacher</h2>

			<div class="formDiv">
				<form action="#" method="POST" enctype="multipart/form-data">
					<div class="inpLeb">
						<label>Teacher Name :</label>
						<input type="text" name="teacher">
					</div>

					<div class="inpLeb">
						<label>Email :</label>
						<input type="email" name="email">
					</div>

					<div class="inpLeb">
						<label>Description :</label>
						<textarea name="desc"></textarea>
					</div>

					<div class="inpLeb">
						<label>Select Image</label>
						<input type="file" name="img">
					</div>

					<div class="inpLeb">
						<input class="btn btn-primary" type="submit" name="add_teacher">
					</div>
				</form>
			</div>
		</center>
	</div>

	</body>
</html>