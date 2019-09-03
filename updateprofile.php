<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$password = $_POST['password'];

	$sql = "UPDATE register SET dateofbirth='$dob',phone='$phone',location='$location',password='$password' WHERE id= '$id'";
	$query = mysqli_query($conn,$sql)  or die(mysqli_error($conn));
	header('Location:accountsettings.php');

}