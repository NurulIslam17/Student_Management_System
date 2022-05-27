<?php

error_reporting(0);
session_start();

$host="localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$con = mysqli_connect($host,$user,$password,$db);

if($con)
{
	echo "Connected";
}else
{
	die("Connection Failed");
}


if($_SERVER["REQUEST_METHOD"]=='POST')
{
	$user = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM `user` WHERE user='".$user."' AND password='".$password."' ";
	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_array($result);

	if($row['usertype']=="student")
	{
		$_SESSION['usertype'] ="student";
		$_SESSION['username'] = $user;
		header("location:studenthome.php");
	}
	elseif ($row['usertype']=="admin") 
	{
		$_SESSION['usertype'] ="admin";
		$_SESSION['username'] = $user;
		header("location:adminhome.php");
	}
	else
	{
		$msg= "User or Password don not match";
		$_SESSION['loginMessage'] = $msg;
		header("location:login.php");
	}
}

?>