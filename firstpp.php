<?php
include('config.php');

session_start();

if($_SESSION['email'])
{
	$id=$_SESSION['id'];
}

if(isset($_POST['submit']))
{
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$college = $_POST['college'];
	$branch = $_POST['branch'];
	$year = $_POST['academy_year'];
	$facebook = $_POST['facebook_link'];
	$twitter = $_POST['twitter_link'];
	$linkedin = $_POST['linkedin_link'];
	$google_plus = $_POST['googleplus_link'];
	$firstlogin = 1;

	$sql = "UPDATE register SET dateofbirth='$dob',phone='$phone',location='$location',college_name='$college',branch='$branch',academy_year='$year',firstlogin='$firstlogin' WHERE id= '$id'";
	$query = mysqli_query($conn,$sql)  or die(mysqli_error($conn));

	$insert = "INSERT INTO sociallink(id,facebook,twitter,linkedin,googleplus) VALUES('$id','$facebook','$twitter','$linkedin','$google_plus')";
	$insert_query = mysqli_query($conn,$insert) or die(mysqli_error($conn));
	header('Location:dash.php');
}