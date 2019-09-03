<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$skill_name = $_POST['skill'];

	$skill = "INSERT INTO skills(id,skill_name) VALUES('$id','$skill_name')";
	$skill_query = mysqli_query($conn,$skill) or die(mysqli_error($conn));
	header('Location:dash.php');
}

?>