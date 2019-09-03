<?php
include('config.php');
	$sql = "SELECT * FROM register";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="owl.carousel.min.css">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="owl.carousel.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<body>
<div class="">
	<form action="excelp.php" method="post">
	<table>
		<thead>
			<tr>
				<th>Roll No</th>
				<th>Name</th>
				<th>College</th>
				<th>Branch</th>
				<th>Year</th>
				<th>Email</th>
				<th>Contact</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($result))
			{
			?>
			<tr>
				<td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["first_name"].' '.$row["last_name"]; ?></td>	
				<td><?php echo $row["college_name"]; ?></td>	
				<td><?php echo $row["branch"]; ?></td>	
				<td><?php echo $row["academy_year"]; ?></td>	
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["phone"]; ?></td>
			</tr>
			<?php
			 }
			 ?>
		</tbody>
	</table>
	<input type="submit" name="submit" class="btn" value="export">
	</form>
</div>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>