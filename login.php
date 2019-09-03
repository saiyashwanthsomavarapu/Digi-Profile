<?php
include('config.php');

session_start();

if(isset($_POST['email']) && isset($_POST['password']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$login_query = "SELECT * FROM register WHERE email='$email'";
	$login_access = mysqli_query($conn,$login_query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($login_access);
	if($count>=1)
	{
		$row = mysqli_fetch_array($login_access);
		$pass = $row['password'];
		$firstlogin = $row['firstlogin'];
		$i = $row['forgetpassword'];
		if($i<3)
		{
			if($pass == $password)  
			{
				if($firstlogin == 1)
				{
					$_SESSION['email'] = $row['email'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['image'] = $row['image'];
					header('Location:kick.php');
				}
				else
				{
					$_SESSION['email'] = $row['email'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['firstlogin'] =$row['firstlogin'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['image'] = $row['image'];
					header('Location:first.php');
				}
			}
			else
			{
				$i = $i + 1;
				$for = "UPDATE register SET forgetpassword='$i' WHERE email='$email'";					
				$for_query = mysqli_query($conn,$for);
				echo '<script>window.location.href="index.php";</script>';
				
			}
		}
		else
		{
			echo '<script>alert("try after 24 hours");</script>';
			echo '<script>window.location.href="index.php";</script>';

		}
	}
	else
	{
		echo '<script>alert("enter the correct password and username");</script>';
		echo '<script>window.location.href="index.php";</script>';	
	}
}
?>