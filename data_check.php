<?php

error_reporting(0);
session_start();

$host="localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$con = mysqli_connect($host,$user,$password,$db);

if(!$con)
{
	die("Connection Failed");
}

if(isset($_POST['apply']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];

	$sql = "INSERT INTO admission (name, email, phone, message)
	 VALUES ('$name', '$email', '$phone', '$message')";

	 $res = mysqli_query($con,$sql);
	 if($res)
	 {
	 	$_SESSION['msg'] = "Data Inserted Successfully";
	 	header("location:index.php");
	 }else
	 {
	 	echo "Data Insertion Failed";
	 }
}


?>