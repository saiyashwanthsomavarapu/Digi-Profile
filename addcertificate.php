<?php
include('config.php');

session_start();

$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$certificate = $_POST['certification_no'];
	$skill_name = $_POST['skill_name'];
	$organized_by = $_POST['organized_name'];
	$year = $_POST['year'];

	if(isset($_POST['updateid']))
	{
		$updateid = $_POST['updateid'];
		$update = "UPDATE certifications SET cerification_no='$certificate',skill='$skill_name',organized_by='$organized_by',year='$year' WHERE certification_id ='$updateid'";
		$update_query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
	else
	{
		$sql = "INSERT INTO certifications(id,cerification_no,skill,organized_by,year) VALUES('$id','$certificate_no','$skill_name','$organized_by','$year')";

		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		header('Location: dash.php');
	}
}

 

if(isset($_POST['deleteid']))
{
	$deleteid = $_POST['deleteid'];
	$delete  = "DELETE FROM certifications WHERE certification_id='$deleteid'";

	$delete_query = mysqli_query($conn,$delete) or die(mysqli_error($conn));
	header('Location: dash.php');
}

?>