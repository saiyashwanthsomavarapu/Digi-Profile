<?php
include('config.php');

session_start();

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$login  = "SELECT * FROM admindetail WHERE email = '$email'";
	$login_query = mysqli_query($conn,$login) or die(mysqli_error($conn));

	$login_count = mysqli_num_rows($login_query);

	if($login_count > 0)
	{
		$rows = mysqli_fetch_array($login_query);
		$cpass = $rows['password'];
		if($cpass == $pass)
		{
			$_SESSION['id'] = $rows['id'];
			$_SESSION['emailadmin'] = $rows['email'];
			$_SESSION['adminfirst_name'] = $rows['first_name'];
			$_SESSION['adminlast_name'] = $rows['last_name'];
			$_SESSION['adminphone'] = $rows['phone'];
			header('Location: homepage.php');
		}
		else
		{

			echo '<script>alert("enter correct password");</script>';
			echo '<script>window.location.href="adminlogin.php";</script>';
		}
	}
	else
	{
			echo '<script>alert("enter correct username and password");</script>';
			echo '<script>window.location.href="adminlogin.php";</script>';
	}
}
?>