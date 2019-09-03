<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$workshop_name = $_POST['domain_name'];
	$organizer = $_POST['organization_name'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$desc = $_POST['description'];

	if(isset($_POST['id']))
	{
		$wid = $_POST['id'];
		$update = "UPDATE workshop SET workshop_name='$workshop_name',oragnizer='$organizer',description='$desc',start_date='$start',end_date='$end' WHERE workshop_id='$wid'";
		$update_query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
	else
	{
		$sql = "INSERT INTO workshop(id,workshop_name,oragnizer,description,start_date,end_date) VALUES('$id','$workshop_name','$organizer','$desc','$start','$end')";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
}

if(isset($_POST['delete']))
{
	$deleteid = $_POST['deleteid'];
	$delete = "DELETE FROM workshop WHERE workshop_id='$deleteid'";
	$delete_query = mysqli_query($conn,$delete) or die(mysqli_error($conn));
	header('Location: dash.php');
}
?>