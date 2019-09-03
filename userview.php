
<?php
include('config.php');
session_start();
if(@$_SESSION['email'] )
{
	$id = $_GET['id'];
	$email = $_SESSION['email'];
}
else if(@$_SESSION['emailadmin'])
{
	$id = $_GET['id'];
} 
else
{
	header('Location: index1.php');
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
		<nav class="white" style="box-shadow:none;">
	    	<div class="nav-wrapper">
	      		<a href="#!" class="brand-logo black-text" style="padding:0px;">
             		<img class="img-responsive" src="logo.png" width="65" height="60">   
            	</a>
	     		<a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons black-text">menu</i></a>
	      		<ul class="right hide-on-med-and-down">
	      			<?php
	      				if(@$_SESSION['emailadmin'])
	      				{
	      			?>
	      			<li><a class="black-text" href="homepage.php"><i class="material-icons">home</i></a></li>
	        		<li class="center"><a class="black-text dropdown-trigger" style="outline: none;" data-target='dropdown1' href=""><i class="material-icons">person</i></a></li>
	        		<?php
	        			}
	        			else if(@$_SESSION['email'])
	        			{
	        		?>
	      				<li><a class="black-text" href="dash.php">Profile</a></li>
	        			<li class="center"><a class="black-text dropdown-trigger" data-target="dropdown1" href=""><?php echo $email; ?></a></li>
	    			<?php
	    				}
	    			?>    	
	  	      		<li><a class="black-text" href="sass.html"></a></li>
	      		</ul>
	    	</div>
	  	</nav>
  	</div>
  <ul id='dropdown1' class='dropdown-content' style="outline: none;">
    <li><a href="accountsettings.php">Account Settings</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  	<ul class="sidenav" id="mobile-demo">
      <?php
        if(@$_SESSION['emailadmin'])
        {
      ?>
      <li><a href="homepage.php">Home</a></li>
      <li><a href="adminsettings.php">Account Settings</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php
       }
       else if(@$_SESSION['email']){
      ?>
  	<ul class="sidenav" id="mobile-demo">
    	<li><a href="kick.php">Dashboard</a></li>
    	<li><a href="dash.php">Profile</a></li>
    	<li><a href="accountsettings.php">Account Settings</a></li>
    	<li><a href="logout.php">Logout</a></li>
  	</ul>
      <?php 
      }
      ?>
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
	<div class="sub_heading blue">
		<div class="">
			<div class="row" style="margin-bottom: 0px;">
				<div class="col s12 m6 13 center">
					<p><span class="thin  white-text" style="font-weight:0;font-size:18px;">Not Certified</span></p>
				</div>
				<div class="col s12 m6 13 center">
					<p><a class="btn-flat center white-text" href="" download="" style="border:1px solid white" style="padding:200px;">Resume Download</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="divider"></div>
	<div class="container">
		<div class="row">
			<div class="col s12 m12 13" style="">
				<h3 class="thin">Skills</h3>
			</div>
		</div>		
		<div  class="skills">
			<div class="row">
	          	<div class="col s12 m12 13">
		          	<div class="owl-carousel owl-theme">
		          		<?php
		          			$skill = "SELECT * FROM skills WHERE id= '$id'";
		          			$skill_query = mysqli_query($conn,$skill) or die(mysqli_error($conn));

		          			while($skill_fetch = mysqli_fetch_array($skill_query))
		          			{
		          				$level =$skill_fetch['grade'];
		          				if($level>0)
		          				{
		          		?>
		            				<div class="item">
		              					<div class="circle center" style="border:1px solid black;width:100px;height:100px;margin:20px 0px 0px 0px ;">
											<p class="center" style="margin-top:30px;"><span class="center" style="font-weight:bold;"><?php echo $skill_fetch['skill_name']; ?></span><br><span class="" style="color:#c6c6c6;">50%</span></p>
										</div>
									</div>
		            	<?php
		            		
	            				}
		            		}	
		            	?>         	
		          	</div>
	          	</div>
       		</div>
		</div>
		<div class="projects">
			<div class="row">
				<div class="col s12 m12 13">
					<h3 class="thin">Projects</h3>
				</div>
			</div>
			<div class="pojects_content">
				<?php
					$project = "SELECT * FROM projects WHERE id='$id'";
					$project_query = mysqli_query($conn,$project) or die(mysqli_error($conn));
					$project_count = mysqli_num_rows($project_query);
					$project_fetch = mysqli_fetch_array($project_query);
				?>
				<div class="row">
					<div class="col s12 m12 13">
						<p class="" style="font-weight:bold;" name="project_name">
							<?php echo $project_fetch['project_name']; ?>
						</p>
						<a href="<?php echo $rows['url']; ?>" class="browser_default" name="url"><?php echo $project_fetch['url']; ?></a><br>
						<p name="description" style="margin:0;padding:0;font-size:14px;text-align: justify;text-justify:inter-word;">
							<?php echo $project_fetch['description']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="academy_details">
			<div class="row">
				<div class="col s12 m12 13">
					<h3 class="thin" >Education</h3>
				</div>
			</div>
			<div class="academy_content">
				<div class="row">
					<div class="col s12 m4 13" style="border-right:1px solid grey;">
						<p class="thin center" style="font-size:40px;">10<sup>th</sup></p>
						<p class="center" style=""><i class="material-icons small center" style="font-size: 1.2rem;
						">query_builder</i><span style="margin:-10px 0px 0px 10px;">2012-2013</span></p>
						<p class="center" style="padding:0;margin:0;">Percentage:<span>80%</span></p>
					</div>
					<div class="col s12 m4 13" style="border-right:1px solid grey;">
						<p class="thin center" style="font-size:40px;">Intermediate</p>
						<p class="center" style=""><i class="material-icons small center" style="font-size: 1.2rem;
						">query_builder</i><span style="margin:-10px 0px 0px 10px;">2013-2015</span></p>
						<p class="center" style="padding:0;margin:0;">Percentage:<span>82%</span></p>
					</div>
					<div class="col s12 m4 13" style="border-right:0px solid grey;">
						<p class="thin center" style="font-size:40px;">B-Tech</p>
						<p class="center" style=""><i class="material-icons small center" style="font-size: 1.2rem;
						">query_builder</i><span style="margin:-10px 0px 0px 10px;">2015-2019</span></p>
						<p class="center" style="padding:0;margin:0;">Percentage:<span>72%</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="training">
			<div class="row">
				<div class="col s12 m12 13">
					<h3 class="thin" >Workshops</h3>
				</div>
			</div>
			<div class="training_content">
				<?php
					$workshop = "SELECT * FROM workshop WHERE id='$id'";
					$workshop_query = mysqli_query($conn,$workshop) or die(mysqli_error($conn));
					$workshops_count = mysqli_num_rows($workshop_query);

					$workshop_fetch = mysqli_fetch_array($workshop_query);
					
				?>
				<div class="row">
					<div class="col s12 m12 13">
						<form action="" method="post">
							<p class="" style="font-weight:bold;" name="Domain_name">
								<?php echo $workshop_fetch['workshop_name']; ?>
							</p>
						</form>
						<p class="thin" style="margin:0;padding:0px;"><?php echo $workshop_fetch['oragnizer']; ?></p>
						<p><i class="material-icons small" style="font-size: 1rem;">query_builder</i><?php echo $workshop_fetch['start_date'].'-'.$workshop_fetch['end_date']; ?></p>
						<p name="description" style="margin:0;padding:0;font-size:14px;text-align: justify;text-justify:inter-word;">
							<?php echo $workshop_fetch['description']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="certification">
			<div class="row">
				<div class="col s12 m12 13">
					<h3 class="thin" >Certification</h3>
				</div>
			</div>
			<div class="certification_content">
				<?php
					$certificate = "SELECT * FROM certifications WHERE id = '$id'";
					$certificate_query = mysqli_query($conn,$certificate) or die(mysqli_error($conn));

					$certificate_count = mysqli_num_rows($certificate_query);
					$certificate_fetch = mysqli_fetch_array($certificate_query)
				?>
				<div class="row">
					<div class="col s12 m12 13">			
						<table class="striped center">
					        <thead >
          						<tr>
              						<th class="center">Skill</th>
					              	<th class="center">Organized By</th>
					              	<th class="center">Year</th>
          						</tr>
        					</thead>
					        <tbody>
          						<tr>
            						<td class="center"><?php echo $certificate_fetch['skill']; ?></td>
            						<td class="center"><?php echo $certificate_fetch['organized_by']; ?></td>
            						<td class="center"><?php echo $certificate_fetch['year']; ?></td>
          						</tr>
        					</tbody>
      					</table>
					</div>
				</div>
			</div>
		</div>
		<div class="internships">
			<div class="row">
				<div class="col s12 m12 13">
					<h3 class="thin" >Internships</h3>
				</div>
			</div>
			<div class="intership_content">
				<?php
					$intern = "SELECT * FROM internships WHERE id = '$id'";
					$intern_query = mysqli_query($conn,$intern) or die(mysqli_error($conn));
					$intern_count = mysqli_num_rows($intern_query);

					$intern_fetch = mysqli_fetch_array($intern_query);
				?>
				<div class="row">
					<div class="col s12 m12 13">
						<form action="" method="post">
							<p class="" style="font-weight:bold;" name="Domain_name">
								<?php echo $intern_fetch['intern_name']; ?>
							</p>
						</form>
						<p class="thin" style="margin:0;padding:0px;"><?php echo $intern_fetch['organization']; ?> </p>
						<p><i class="material-icons small" style="font-size: 1rem;">query_builder</i>
							<?php echo $intern_fetch['start_date'].'-'.$intern_fetch['end_date']; ?></p>
						<p name="description" style="margin:0;padding:0;font-size:14px;text-align: justify;text-justify:inter-word;">
							<?php echo $intern_fetch['description']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="social_links">
			<?php
				$social = "SELECT * FROM sociallink WHERE id='$id'";
				$social_query = mysqli_query($conn,$social) or die(mysqli_error($conn));
				$social_fetch =mysqli_fetch_array($social_query);
			?>
			<div class="row">
				<div class="col s3 m1 13 center" style="padding:30px 0px 30px 0px;">
					<div class="circle z-depth-1" style="border:1px solid #29487d;background-color:#29487d;width:60px;height:60px;margin:20px 0px 0px 0px ;">
						<a href="<?php echo $social_fetch['facebook']; ?>"><p class="center" style="margin-top:10px;background-color:"><span style="font-weight:bold;font-size:25px;color:white;">f</span></p></a>
					</div>				
				</div>
				<div class="col s3 m1 13 center" style="padding:30px 0px 30px 0px;">
					<div class="circle z-depth-1 " style="border:1px solid #2196F3;background-color:#2196F3;width:60px;height:60px;margin:20px 0px 0px 0px ;">
						<a href="<?php echo $social_fetch['twitter']; ?>"  style="margin-top:20px;background-color: ;font-size:20px;font-weight: bold;color:white;" class="fa fa-twitter"></a>
					</div>				
				</div>
				<div class="col s3 m1 13 center" style="padding:30px 0px 30px 0px;">
					<div class="circle z-depth-1 " style="border:1px solid #d32f2f;background-color:#d32f2f;width:60px;height:60px;margin:20px 0px 0px 0px ;">
						<a href="<?php echo $social_fetch['linkedin']; ?>"  style="margin-top:20px;background-color: ;font-size:20px;font-weight: bold;color:white;" class="fa fa-google"> +</a>
					</div>				
				</div>
			</div>
		</div>
	</div>
    <footer style="padding-top:80px;padding-bottom:50px;background-color:#eeeeee;">
        <div class="center">
            <h3 class="thin">DIGI PROFILE</h3>
            <small style="position:relative">Designed by skydo's </small>
        </div> 
    </footer>
    <script type="text/javascript">
    $(document).ready(function() {
    	$('.sidenav').sidenav();
    	$('select').formSelect();
    	$('.dropdown-trigger').dropdown();
    	$('.datepicker').datepicker();
    	$('.modal').modal();
    	$('.date').datepicker({
    		format: 'yyyy',
    		selectYears: true
    	});
    	$('.carousel.carousel-slider').carousel({
    	 	fullWidth:false
    	 });
    	$('input#input_text, textarea#description').characterCounter();
        
        var owl = $('.owl-carousel');
        owl.owlCarousel({
                items: 5,
                loop: false,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true
        });

        var skill = $('.skill-slider');
        skill.owlCarousel({
        	items:1,
        	loop: false,
        	margin:10,
        	autoplay:true,
        	autoplayTimeout: 1000,
        	autoplayHoverPause: true
        });

  	});
    </script>
    <!-- <script src="highlight.js"></script> -->
    <!-- <script src="app.js"></script> -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>