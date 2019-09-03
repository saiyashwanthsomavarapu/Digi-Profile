<?php
include('config.php');

session_start();

if($_POST['deleteid'])
{
	$id = $_POST['deleteid'];
	$delete = "DELETE FROM register WHERE id = '$id'";
	$db = mysqli_query($conn,$delete) or die(mysqli_error($conn));
	header('Location: studendetails.php');
}


// if(isset($_POST['delete_row']))
// {
// 	$row_no = $_POST['row_id'];

// 	$delete = "DELETE FROM register WHERE id = '$row_id'";
// 	$db = mysqli_query($conn,$delete) or die(mysqli_error($conn));
// 	echo 'success';
// 	exit();
// }
?>