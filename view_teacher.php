<?php
	error_reporting(0);
	session_start();
	include 'connection.php';

	$sql = "SELECT * FROM teachers";
	$sqlQ = mysqli_query($con,$sql);

	if($_GET['delkey'])
	{
		$t_id = $_GET['delkey'];
		$sqlDel = "DELETE FROM teachers WHERE id='$t_id'";
		$delRes = mysqli_query($con,$sql);

		if($delRes)
		{
			echo "Deleted Successfull";
			header('location:view_teacher.php');
		}
		else
		{
			echo "Failed";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Teachers</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<!-- CDN  BOOTSTRAP-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</head>
	<body>
	 <?php
	  include 'admin_sidebar.php';

	 ?>

	<div class="contents">
		<h2>List of Teachers</h2>

		<table class="table table-bordered table-striped">
		  <thead>
		    <tr class="bg-primary">
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Describtion</th>
		      <th scope="col">Image</th>
		      <th scope="col">Update</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  	while ($data=$sqlQ->fetch_assoc()) 
		  	{
		  	
		  	?>
		  	 <tr>
		      <td><?php echo "{$data['teacherName']}";  ?></td>
		      <td><?php echo "{$data['email']}";  ?></td>
		      <td><?php echo "{$data['des']}";  ?></td>
		      <td>
		      	<img height="80px" width="100px" src="<?php echo "{$data['image']}";  ?>">
		      </td>
		      <td scope="col" class="text-center">
		      	<?php
		      		echo "<a href='view_teacher.php?key={$data['id']}' class='btn btn-success'>Update</a>";
		      	?>
		      </td>
		      <td scope="col" class="text-center">
		      	<?php
		      		echo "<a href='view_teacher.php?delkey={$data['id']}' class='btn btn-danger'>Delete</a>";
		      	?>
		      </td>
		      
		    </tr>

		  	<?php
		  	}

		  	?>
		  </tbody>
		</table>
	</div>
	</body>
</html>