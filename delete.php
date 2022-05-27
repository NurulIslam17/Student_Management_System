<?php

error_reporting(0);
session_start();

include 'connection.php';

if(isset($_GET['del']))
{
	$deleteID = $_GET['del'];
	$sql = "DELETE FROM user WHERE id = $deleteID";
	$res = mysqli_query($con,$sql);

	if($res)
	{
		header('location:view_student.php');
	}
	else
	{
		die(mysqli_error($con));
	}
}

?>
