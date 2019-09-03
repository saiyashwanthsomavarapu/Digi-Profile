<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$intern_name = $_POST['domain_name'];
	$organization = $_POST['organization_name'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$desc = $_POST['description'];

	if($_POST['internid'])
	{
		$internid = $_POST['internid'];
		$update = "UPDATE internships SET intern_name='$intern_name,organization='$organization,description='$desc',start_date='$start',end_date='$end' WHERE intern_id='$internid'";
		$update_query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
	else
	{
		$sql = "INSERT INTO internships(id,intern_name,organization,description,start_date,end_date) VALUES('$id','$intern_name','$organization','$desc','$start','$end')";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
}

if($_POST['deleteid'])
{
	$deleteid = $_POST['deleteid'];
	$delete = "DELETE FROM internships WHERE intern_id='$deleteid'";
	$delete_query = mysqli_query($conn,$delete) or die(mysqli_error($conn));
	header('Location: dash.php');
}
?>