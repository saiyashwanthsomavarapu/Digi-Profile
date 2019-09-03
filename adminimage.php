<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$file = $_FILES["file"]["name"];
	$tmp_name = $_FILES["file"]["tmp_name"];
	$path = 'uploads/'.$file;
	$file1 = explode(".",$file);
	$ext = $file1[1];
	$allowed = array("jpg","png");
	if(in_array($ext,$allowed))
	{
		move_uploaded_file($tmp_name,$path);
		$insert = "UPDATE admindetail SET image='$file' WHERE id='$id'";
		$insert_query = mysqli_query($conn,$insert) or die(mysqli_error($conn));
		if($insert_query)
		{
			header('Location: adminsetting.php');
		}
		else
		{
			echo "<script>alert('not uploaded');</script>";
		}
	}

}
?>