<?php
include('config.php');
session_start();
if(isset($_POST['submit']))
{
		
		$sendemail = $_POST['dataset'];
		$_SESSION['dataset'] = $sendemail;
		$sql = "SELECT * FROM register WHERE email='$sendemail'";
		$sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));

		$sql_count = mysqli_num_rows($sql_query);
		echo $sql_count;
		if($sql_count > 0 )
		{
			header('Location:updatepassword.php');
		}
		else
		{
			header('Location:index.php');
		}
}
?>