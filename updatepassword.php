<?php
include('config.php');

session_start();
if($_SESSION['dataset'])
{
	$email = $_SESSION['dataset'];
//	header('Location:updatepassword.php');
}
else
{
	header('Location:index.php');
}
if(isset($_POST['submit']))
{
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	if($pass1 == $pass2)	
	{
		$update_pass = "UPDATE register SET password = '$pass1' WHERE email='$email'";
		$update_query = mysqli_query($conn,$update_pass) or die(mysqli_error($conn));
		header('Location:index.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <script src="https://use.fontawesome.com/cf3c7a7aaa.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
        </style>
    </head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col s12 m3 13">
    			</div>
    			<div class="col s12 m6 13 center" style="border:1px solid #eeeeee;margin-top:100px;padding:0px 0px 20px 20px;">
    				<h3>Change Password</h3>
    				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	    				<div class="row center">
	    					<div class="input-field col s12 m10 13">
	    						<input type="password" name="pass1" id="password">
	    						<label for="password">New Password</label>
	    					</div>
	    				</div>
	    				<div class="row">
	    					<div class="input-field col s12 m10 13">
	    						<input type="password" name="pass2" id="password">
	    						<label for="password">Confirm Password</label>
	    					</div>
	    				</div>
	    				<div class="center">
	    					<button type="submit" name="submit" class="btn-flat" style="border:1px solid black;border-radius:16px;">submit</button>
	    				</div>
	    			</form>
    			</div>
    			<div class="col s12 m3 13">
    			</div>
    		</div>
    	</div>
    </body>
</html>