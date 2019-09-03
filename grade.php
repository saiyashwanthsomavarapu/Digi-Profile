<?php
include('config.php');

session_start();

if(isset($_POST['submit']))
{
	$idno = $_POST['idno'];
	$name = $_POST['name'];
	$grade = $_POST['grade'];
	$sql = "UPDATE skills SET grade='$grade' WHERE skill_id='$name'";
	$sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header('Location: admintedit.php?id='.$idno);	
}
?>