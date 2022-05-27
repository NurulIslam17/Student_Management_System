
<?php
	session_start();

	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}
	elseif ($_SESSION['usertype'] == 'admin') 
	{
		header("location:login.php");
	}

	include 'connection.php';
	$name = ($_SESSION['username']);
	$sql = "SELECT * FROM user WHERE user ='$name'";
	$res = mysqli_query($con,$sql);

	$data = mysqli_fetch_assoc($res);

	if(isset($_REQUEST['update']))
	{
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sqlUpdate = "UPDATE user SET phone='$phone',email='$email',password='$password' WHERE user = '$name'";
		$updateRes = mysqli_query($con,$sqlUpdate);

		if($updateRes)
		{
			header('location:studenthome.php');
		}
		else
		{
			echo "Profile not Updated";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
			width: 100px;
			padding-right: 3px;
		}

		.inpLeb
		{
			padding: 10px;
		}


		.formDiv
		{
			background-color: skyblue;
			width: 350px;
			padding: 20px 20px;
		}
	</style>
</head>
<body>

	<?php
		include 'student_sidebar.php';
	?>

	<div class="contents">
		<center>
			<h2>Profile Update</h2>
			<form action="#" method="POST">

				<div class="formDiv">
					<div class="inpLeb">
						<label>Phone</label>
						<input type="text" name="phone" value="<?php echo "{$data['phone']}" ?>">
					</div>

					<div class="inpLeb">
						<label>Email</label>
						<input type="email" name="email" value="<?php echo "{$data['email']}" ?>">
					</div>
					
					<div class="inpLeb">
						<label>Password</label>
						<input type="password" name="password" value="<?php echo "{$data['password']}" ?>">
					</div>

					<div>
						<input class="btn btn-success" type="submit" name="update" value="Update">
					</div>
				</div>
			</form>
		</center>
		
	</div>

</body>
</html>