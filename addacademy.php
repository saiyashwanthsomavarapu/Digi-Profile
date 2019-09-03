<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$degree = $_POST['degree'];
	$start = $_POST['start'] ;
	$end = $_POST['end'];
	$percentage = $_POST['percentage'];

	$duration =  $start.'-'.$end;

	$sql = "INSERT INTO education(id,degree,year,percentage) VALUES('$id','$degree','$duration','$percentage')";
	$query = mysqli_query($conn,$sql)or die(mysqli_error($conn));
	echo '<script>window.location.href="dash.php";</script>';
}