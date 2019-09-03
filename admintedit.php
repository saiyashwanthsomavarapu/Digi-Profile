<?php
include('config.php');

session_start();
if($_SESSION['emailadmin'])
{
	if($_GET['id'])
	{
		$id = $_GET['id'];
	}
}
else
{
	header('Location: adminlogin.php');
}
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
    <style>
    body,html{
      margin:0;
      padding:0;
      max-height:100%;
    }
    body::-webkit-scrollbar {
      width: 0.2em;
    }
 
    body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
 
    body::-webkit-scrollbar-thumb {
      background-color: #2196f3;
      outline: 1px solid #2196f3;
    }
	</style>	

</head>
<body>
	<div class="navbar-fixed">
		<nav class="white" style="box-shadow:0px 0px 0.01px white;">
	    	<div class="nav-wrapper">
	      		<a href="#!" class="brand-logo black-text" style="padding:0px;">
             		<img class="img-responsive" src="logo.png" width="65" height="60">   
            	</a>
	     		<a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons black-text">menu</i></a>
	      		<ul class="right hide-on-med-and-down">
	      			<li><a class="black-text" href="homepage.php"><i class="material-icons">home</i></a></li>
	        		<li class="center"><a class="black-text dropdown-trigger" style="outline: none;" data-target='dropdown1' href=""><i class="material-icons">person</i></a></li>
	        		<li><a class="black-text" href="sass.html"></a></li>
	      		</ul>
	    	</div>
	  	</nav>
  	</div>
  	<ul id='dropdown1' class='dropdown-content' style="outline: none;">
    	<li><a href="adminsettings.php">Account Settings</a></li>
    	<li class="divider" tabindex="-1"></li>
    	<li><a href="logout.php">Logout</a></li>
  	</ul>
  	<ul class="sidenav" id="mobile-demo">
    	<li><a href="homepage.php">Home</a></li>
   	   	<li><a href="adminsettings.php">Account Settings</a></li>
     	<li><a href="logout.php">Logout</a></li> 	
  	</ul>
	<div class="profile">
		<div class="container">
			<?php

			$reg_get = "SELECT * FROM register WHERE id='$id'";
			$reg_query = mysqli_query($conn,$reg_get) or die(mysqli_error($conn));
			$reg_count = mysqli_num_rows($reg_query);
			$reg_fetch = mysqli_fetch_array($reg_query);
			
			?>
			<div class="row">
				<div class="col s12 m6 13 center" style="padding:30px 0px 30px 0px;">
					<img class="img-responsive circle z-depth-0" style="border:3px solid #eeeeee;" width="150" height="150" src="uploads/<?php echo $reg_fetch['image']; ?>">
					<p style="font-weight: 600;"></p>
				</div>
				<div class="col s12 m6 13" style="padding:40px 0px 40px 0px;">
					<div class="" style="box-shadow: 0px 0px 0px #eeeeee;padding: 20px;">
						<p style="margin:0;padding:0;">
							<div class="row" style="margin:0;padding:0;line-height:20px;">
								<div class="col s3" style="margin:0;padding:0;">
									<span style="font-weight:bold;">Name:</span>
								</div>
								<div class="col s9" style="margin:0;padding:0;">
									<span ><?php echo $reg_fetch['first_name'].' '.$reg_fetch['last_name']; ?></span>
								</div>
							</div>
							<div class="row" style="margin:0;padding:0;line-height:20px;">
								<div class="col s3" style="margin:0;padding:0;">
									<span style="font-weight:bold;">Roll:</span>
								</div>
								<div class="col s9" style="margin:0;padding:0;">
									<span ><?php echo $reg_fetch['id']; ?></span>
								</div>
							</div>
							<div class="row" style="margin:0;padding:0;line-height:20px;">
								<div class="col s3" style="margin:0;padding:0;">
									<span style="font-weight:bold;">College:</span>
								</div>
								<div class="col s9" style="margin:0;padding:0;">
									<span ><?php echo $reg_fetch['college_name']; ?></span>
								</div>
							</div>
							<div class="row" style="margin:0;padding:0;line-height:20px;">
								<div class="col s3" style="margin:0;padding:0;">
									<span style="font-weight:bold;">Phone:</span>
								</div>
								<div class="col s9" style="margin:0;padding:0;">
									<span ><?php echo $reg_fetch['phone']; ?></span>
								</div>
							</div>
							<div class="row" style="margin:0;padding:0;line-height:20px;">
								<div class="col s3" style="margin:0;padding:0;">
									<span style="font-weight:bold;">Branch:</span>
								</div>
								<div class="col s9" style="margin:0;padding:0;">
									<span><?php echo $reg_fetch['branch']; ?></span>
								</div>
							</div>
							<div class="row" style="margin:0;padding:0;line-height:20px;">
								<div class="col s3" style="margin:0;padding:0;">
									<span style="font-weight:bold;">Year:</span>
								</div>
								<div class="col s9" style="margin:0;padding:0;">
									<span><?php echo $reg_fetch['academy_year']; ?></span>
								</div>
							</div>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="divider"></div>
	<div class="sub_heading blue" style="background-color:">
		<div class="container">
			<div class="row" style="margin-bottom: 0px;">
				<div class="col s12 m6 13">
				</div>
				<div class="col s12 m6 13 center">
					<p><a class="btn-flat center white-text" href="studendetails.php" style="border:1px solid white" style="padding:200px;">All List</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="divider"></div>
	<div class="container">
		<h3 class="thin">Skills</h3>

			<div class="row">
				<?php
				$get = "SELECT * FROM skills WHERE id='$id'";
				$get_query = mysqli_query($conn,$get) or die(mysqli_error($conn));
				$get_count = mysqli_num_rows($get_query);
				while($get_fetch= mysqli_fetch_array($get_query))
				{
				?>
				<div class="col s12 m6 13">
					<form action="grade.php" method="post">
						<input type="hidden" name="idno" value="<?php echo $id; ?>">
					<div class="row">
						<div class="input-field col s4 m4 13" style="margin:0;padding:0;outline:none;">
			  				<select class="browser-default black-text" name="name" style="border:1px solid grey;border-radius: 16px 0px 0px 16px;">
			    				<option value="<?php echo $get_fetch['skill_id']; ?>"  selected><?php echo $get_fetch['skill_name']; ?></option>
			  				</select>
						</div>			
						<div class="input-field col s4 m4 13" style="margin:0;padding:0;outline:none;">
			  				<select class="browser-default" name="grade" style="border:1px solid grey;border-radius: 0px 16px 16px 0px;outline:none;" value="">
			    				<option value="0" selected><?php echo $get_fetch['grade']; ?></option>
							    <option value="25">25</option>
			    				<option value="50">50</option>
			    				<option value="75">75</option>
			    				<option avlue="100">100</option>>
			  				</select>
						</div>
						<div class="col s3 m3 13" style="padding:5px 0px 0px 0px;">
							<button type="submit" name="submit" class="btn-flat right" style="border:1px solid black;border-radius:16px;">Save</button>
						</div>
					</div>
					</form>
				</div>
				<?php
					}
				?>
			</div>
		
	</div>
    <footer style="padding-top:50px;padding-bottom:50px;background-color:#D0D3D4;">
        <div class="center">
            <h3 class="thin">DIGI PROFILE</h3>
            <small style="position:relative">Designed by skydo's </small>
        </div> 
    </footer>
  <script>
  	$(document).ready(function(){
  		$('.sidenav').sidenav();
  		$('.dropdown-trigger').dropdown();
  	});
  </script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>