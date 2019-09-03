<?php
include('config.php');

session_start();

$id = $_SESSION['id'];
$decoded = str_rot13(str_rot13($id));

if(isset($_POST['submit']))
{
	$projectname = $_POST['project_name'];
	$description = $_POST['description'];
	$role = $_POST['role'];
	$url = $_POST['link'];

	if(isset($_POST['id']))
	{
		$pid = $_POST['id'];
		$update =  "UPDATE projects SET project_name='$projectname',description='$description',role='$role',url='$url' WHERE project_id='$decoded'";
		$update_query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
	else
	{
		$insert = "INSERT INTO projects(id,project_name,description,role,url) VALUES('$id','$projectname','$description','$role','$url')";

		$insert_query = mysqli_query($conn,$insert) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
}

if(isset($_POST['delete']))
{
	$deleteid = $_POST['deleteid'];
	$delete = "DELETE FROM projects WHERE project_id='$deleteid'";
	$delete_query = mysqli_query($conn,$delete) or die(mysqli_error($conn));
	header('Location: dash.php');
}
?>