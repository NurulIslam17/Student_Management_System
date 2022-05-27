<?php

error_reporting(0);
session_start();

include 'connection.php';
$sql = "SELECT * FROM user where usertype = 'admin'";
$res = mysqli_query($con,$sql);
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Admin</title>
	<!-- CDN  BOOTSTRAP-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
	<body>
	 <?php
	  include 'admin_sidebar.php';

	 ?>

	<div class="contents">
		<h2>Admin Members</h2>

		<table class="table table-bordered table-striped">
		  <thead class="bg-primary">
		    <tr>
		      <th scope="col">Serial</th>
		      <th scope="col">Id</th>
		      <th scope="col">Student</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Email</th>
		      <th scope="col">Password</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php
		  	$serial=0;
		  	while($data = $res->fetch_assoc())
		  	{
		  		$serial++;
		  	?>
		  	<tr>
		      <td> <?php echo "{$serial}"?> </td>
		      <td> <?php echo "{$data['id']}" ?> </td>
		      <td> <?php echo "{$data['user']}" ?> </td>
		      <td> <?php echo "{$data['phone']}" ?> </td>
		      <td> <?php echo "{$data['email']}" ?> </td>
		      <td> <?php echo "{$data['password']}" ?> </td>
		    </tr>


		  	<?php

		  	}

		  	?>
		  </tbody>
		</table>
	</div>
	</body>
</html>