<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	$sql = "UPDATE admindetail SET phone='$phone',password='$password' WHERE id= '$id'";
	$query = mysqli_query($conn,$sql)  or die(mysqli_error($conn));
	header('Location: adminsettings.php');

}