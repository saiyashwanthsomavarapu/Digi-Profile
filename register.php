<?php
include('config.php');

if(isset($_POST['submit']))
{
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$roll = $_POST['roll'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$image = 'profile.png';
	if($password == $cpassword)
	{
		$sql = "SELECT email FROM register WHERE email='$email'";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$count = mysqli_num_rows($query);
		if($count == 0)
		{
			$insert = "INSERT register(id,first_name,last_name,email,password,image) VALUES('$roll','$firstname','$lastname','$email','$password','$image')";
			$insert_query = mysqli_query($conn,$insert) or die(mysqli_error($conn));
			echo '<script>window.location.href="index.php";</script>';
		}
		else
		{
			echo '<script>alert("exists");</script>';
			echo '<script>window.location.reload="index.php";</script>';			
		}
	}
	else
	{
		echo '<script>alert("not matched");</script>';
		echo '<script>window.location.reload="index.php";</script>';
	}
}
?>