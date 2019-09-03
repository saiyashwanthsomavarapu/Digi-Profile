<?php 
include('config.php');

$q1 = mysqli_query($conn,"SELECT * FROM skills WHERE id='15' ORDER BY grade") or die(mysqli_error($conn));
while($q_fetch = mysqli_fetch_array($q1))
{
	echo $q_fetch['skill_name']." ".$q_fetch['grade']." ".$q_fetch['id']."<br>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>