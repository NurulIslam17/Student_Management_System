<?php

error_reporting(0);
session_start();

include 'connection.php';
$sql = "SELECT * FROM admission";
$res = mysqli_query($con,$sql);
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
</head>
	<body>
	 <?php
	  include 'admin_sidebar.php';

	 ?>

	<div class="contents">
		<h2>Applied for the Admission</h2>

		<table class="table table-bordered table-striped">
		  <thead class="bg-primary">
		    <tr>
		      <th scope="col">Serial</th>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Message</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php
		  	$serial =0;
		  	while ($info = $res->fetch_assoc())
		  	 {
		  	 	$serial++;
		  	?>
		    <tr>
		      <th scope="row"><?php echo "{$serial}"?></th>
		      <td><?php echo"{$info['id']}" ?></td>
		      <td><?php echo"{$info['name']}" ?></td>
		      <td><?php echo"{$info['email']}" ?></td>
		      <td><?php echo"{$info['phone']}" ?></td>
		      <td><?php echo"{$info['message']}" ?></td>
		    </tr>

		    <?php
		    }
		    ?>
	
		  </tbody>
		</table>
	</div>

	</body>
</html>