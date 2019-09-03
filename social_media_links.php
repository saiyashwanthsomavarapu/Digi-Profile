<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$facebook = $_POST['facebook_link'];
	$twitter = $_POST['twitter_link'];
	$linkedin = $_POST['linkedin_link'];
	$google_plus = $_POST['googleplus_link'];

	$sql = "SELECT * FROM sociallink WHERE id='$id'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$count = mysqli_num_rows($query);

	$update = "UPDATE sociallink SET facebook='$facebook',twitter='$twitter',linkedin='$linkedin',googleplus='$google_plus' WHERE id='$id'";

	$update_query = mysqli_query($conn,$update) or die(mysqli_error($conn));
	header('Location: accountsettings.php');
}
?>