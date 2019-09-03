
<?php
	include('config.php');
	session_start();
	if($_SESSION['email'])
	{
		$email = $_SESSION['email'];
		$id = $_SESSION['id'];
		$firstname = $_SESSION['first_name'];
		$lastname = $_SESSION['last_name'];
		$sql = "SELECT * FROM register WHERE id='$id'";
		$sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$fetch = mysqli_fetch_array($sql_query);
	}
	else
	{
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="css/owl.carousel.min.css">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
    body,html{
    	margin:0;
    	padding:0;
    	height:100%;
    	background-color:;
    }
    body::-webkit-scrollbar {
      width: 0.2em;
    }
 
    body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
 
    body::-webkit-scrollbar-thumb {
      background-color: darkgrey;
      outline: 1px solid slategrey;
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
	      			<li><a class="black-text" href="kick.php">Dashboard</a></li>
	      			<li><a class="black-text" href="dash.php">Profile</a></li>
	        		<li class="center"><a class="black-text dropdown-trigger" style="outline: none;" data-target='dropdown1' href="logout.php"><?php echo $email; ?></a></li>
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
    	<li><a href="kick.php">Dashboard</a></li>
    	<li><a href="dash.php">Profile</a></li>
    	<li><a href="accountsettings.php">Account Settings</a></li>
    	<li><a href="logout.php">Logout</a></li>
  	</ul>
	<div class="profile">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 13 center" style="padding:30px 0px 30px 0px;">
					<img class="img-responsive circle" style="border:3px solid #eeeeee;" width="100" height="100" alt="sai.png" src="uploads/<?php echo $fetch['image']; ?>">
					<p style="font-weight: 600;"><?php echo $firstname.' '.$lastname; ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="divider"></div>
	<div class="sub_heading blue">
		<div class="container">
			<div class="row" style="margin-bottom: 0px;">
				<div class="col s12 m6 13">
					<p><span class="thin  white-text" style="font-weight:0;font-size:20px;">Not Certified</span></p>
				</div>
				<div class="col s12 m6 13 center">
<!-- 					<p><a class="btn-flat center white-text" href="" download="" style="border:1px solid white" style="padding:200px;">Resume Download</a></p> -->
				</div>
			</div>
		</div>
	</div>
	<div class="divider"></div>

	<div class="container">
		<div class="row">
			<div class="col s12 m12 13" style="">
				<h3 class="thin" style="position: absolute;">Skills</h3>
				<p class="right" style="margin-top:40px;"><a id="model"  href="#skillupload" class="btn-flat z-depth-0 modal-trigger" style="text-align:center;border-radius:16px;padding:0px 30px 0px 30px; border:1px solid #2196F3;">ADD</a></p>
			</div>
		</div>		
		<div  class="skills">

			<div class="row">
	          	<div class="col s12 m12 13">
		          	<div class="owl-carousel owl-theme">
					<?php
						$skill = "SELECT * FROM skills WHERE id='$id'";
						$skill_query = mysqli_query($conn,$skill) or die(mysqli_error($conn));

						while($rows = mysqli_fetch_array($skill_query))
						{
					?>
		            	<div class="item">
		              		<div class="circle center" style="border:1px solid black;width:100px;height:100px;margin:20px 0px 0px 0px ;">
								<p class="center" style="margin-top:30px;"><span class="center" style="font-weight:bold;"><?php echo $rows['skill_name']; ?></span><br><span class="" style="color:#c6c6c6;">50%</span></p>
							</div>
		            	</div>
		            <?php
       					}
       				?>           	
		          	</div>
	          	</div>
       		</div>

       		<div class="modal" id="skillupload" style="outline: none;max-height:100%;">
       			<div class="modal-content">
       				<form action="addskills.php" method="post" >
       					<h3 class="thin center">Add Skills</h3>
       					<div class="row">
       						<div class="input-field col s12 m12 13">
       							<input id="skill" type="text" name="skill" class="validate">
       							<label for="skill">Skill</label>
       						</div>
       					</div>
       					<div class="right">
       						<button class="btn-flat z-depth-0"  type="submit" name="submit" style="border:1px solid black;border-radius:16px;">Add</button>
       					</div>
       				</form>
       			</div>
       		</div>
		</div>
		<div class="projects">
			<div class="row">
				<div class="col s12 m12 13" style="">
					<h3 class="thin" style="position: absolute;">Projects</h3>
					<p class="right" style="margin-top:40px;"><a id="model"  href="#modal1" class="btn-flat z-depth-0 modal-trigger" style="text-align:center;border-radius:16px;padding:0px 30px 0px 30px; border:1px solid #2196F3;">ADD</a></p>
				</div>
			</div>
			<div class="pojects_content">
				<?php
					$project = "SELECT * FROM projects WHERE id='$id'";
					$project_query = mysqli_query($conn,$project) or die(mysqli_error($conn));
					$project_count = mysqli_num_rows($project_query);
					while($rows = mysqli_fetch_array($project_query))
					{
				?>
				<div class="row">
					<div class="col s12 m12 13">
						<p class="" style="font-weight:bold;" name="project_name"><?php echo $rows['project_name']; ?>
						<a href="#update1<?php echo $rows['project_id']; ?>" id="edit" class="btn-flat right modal-trigger"><i class="material-icons small">create</i></a>
						<a href= "#delete1<?php echo $rows['project_id']; ?>" id="remove" class="right btn-flat modal-trigger"><i class="material-icons small">delete</i></a>
					</p>
						<a href="<?php echo $rows['url']; ?>" class="browser_default" name="url"><?php echo $rows['url']; ?></a><br>
						<p name="description" style="margin:0;padding:0;font-size:14px;text-align: justify;text-justify:inter-word;">
							<?php echo $rows['description']; ?>
						</p>
					</div>
				</div>
				<div class="modal" id="update1<?php echo $rows['project_id']; ?>" style="max-height: 90%;width:65%;outline:none;">
					<div class="modal-content">	
						<h5 class="center" style="font-weight:100;">Add Project</h5>
						<form class="container" action="addprojects.php" method="post">
							<input type="hidden" name="id" value="<?php echo $rows['project_id']; ?>">
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" id="project_name" value="<?php echo $rows['project_name']; ?>" name="project_name" class="validate" required>
									<label for="project_name">Project Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<textarea id="description" value="<?php echo $rows['description']; ?>" name="description" class="materialize-textarea" data-length="300" required><?php echo $rows['description']; ?></textarea>
									<label for="description">Description</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" id="role_name" name="role" value="<?php echo $rows['role']; ?>" class="validate" required>
									<label  for="role_name">Role</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" value="<?php echo $rows['url']; ?>" name="link" id="link" class="validate">
									<label for="link">Link</label>
								</div>
							</div>
							<div class="right">
								<button type="submit" class="btn-flat z-depth-0" name="submit" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</a>
							</div>
						</form>
					</div>
				</div>
				<div class="modal" id="delete1<?php echo $rows['project_id']; ?>" >
					<div class="modal-content">
						<form action="addprojects.php" method="post">
							<input type="hidden" name="deleteid" value="<?php echo $rows['project_id']; ?>">
							<p>Are you sure you want to delete?</p>
							<button name="delete" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Delete</button>
						</form>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<div class="modal" id="modal1" style="max-height: 90%;width:65%;outline:none;">
				<div class="modal-content">	
					<h5 class="center" style="font-weight:100;">Add Project</h5>
					<form class="container" action="addprojects.php" method="post">
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" id="project_name" name="project_name" class="validate" required>
								<label for="project_name">Project Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<textarea id="description" name="description" class="materialize-textarea" data-length="300" required></textarea>
								<label for="description">Description</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" id="role_name" name="role" class="validate" required>
								<label  for="role_name">Role</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" name="link" id="link" class="validate" >
								<label for="link">Link</label>
							</div>
						</div>
						<div class="right">
							<button type="submit" class="btn-flat z-depth-0" name="submit" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="academy_details">
			<div class="row">
				<div class="col s12 m12 13" style="">
					<h3 class="thin" style="position: absolute;">Education</h3>
					<p class="right" style="margin-top:40px;"><a id="model"  href="#modal2" class="btn-flat z-depth-0 modal-trigger" style="text-align:center;border-radius:16px;padding:0px 30px 0px 30px; border:1px solid #2196F3;">ADD</a></p>
				</div>
			</div>
			<div class="academy_content">
				<div class="row">
					<div class="col s12 m4 13" style="border-right:1px solid grey;">
						<?php
							$val = 'SSC';
							$ssc = "SELECT * FROM education WHERE id='$id' AND degree='$val'";
							$ssc_query = mysqli_query($conn,$ssc) or die(mysqli_error($conn));
							$ssc_fetch = mysqli_fetch_array($ssc_query);
						?>
						<p class="thin center" style="font-size:40px;">SSC</p>
						<p class="center" style=""><i class="material-icons small center" style="font-size: 1.2rem;
						">query_builder</i><span style="margin:-10px 0px 0px 10px;"><?php echo $ssc_fetch['year']; ?></span></p>
						<p class="center" style="padding:0;margin:0;">Percentage:<span><?php echo $ssc_fetch['percentage']; ?></span></p>
					</div>
					<div class="col s12 m4 13" style="border-right:1px solid grey;">
						<?php
							$val = 'Intermediate';
							$val1 = 'Diploma';
							$inter = "SELECT * FROM education WHERE id='$id' AND (degree='$val' or degree='$val1')";
							$inter_query = mysqli_query($conn,$inter) or die(mysqli_error($conn));
							$inter_fetch = mysqli_fetch_array($inter_query);
						?>	
						<p class="thin center" style="font-size:40px;">Inter/Diploma</p>
						<p class="center" style=""><i class="material-icons small center" style="font-size: 1.2rem;
						">query_builder</i><span style="margin:-10px 0px 0px 10px;"><?php echo $inter_fetch['year']; ?></span></p>
						<p class="center" style="padding:0;margin:0;">Percentage:<span><?php echo $inter_fetch['percentage']; ?></span></p>
					</div>
					<div class="col s12 m4 13" style="border-right:0px solid grey;">
						<?php
							$val = 'B-Tech';
							$tech = "SELECT * FROM education WHERE id='$id' AND degree='$val'";
							$tech_query = mysqli_query($conn,$tech) or die(mysqli_error($conn));
							$tech_fetch = mysqli_fetch_array($tech_query);
						?>						
						<p class="thin center" style="font-size:40px;">B-Tech</p>
						<p class="center" style=""><i class="material-icons small center" style="font-size: 1.2rem;
						">query_builder</i><span style="margin:-10px 0px 0px 10px;"><?php echo $tech_fetch['year']; ?></span></p>
						<p class="center" style="padding:0;margin:0;">Percentage:<span><?php echo $tech_fetch['percentage']; ?></span></p>
					</div>
				</div>
			</div>
			<div class="modal" id="modal2" style="height: 80%;width:65%;outline:none;">
				<div class="modal-content">
					<h5 class="center" style="font-weight:100;">Add Education</h5>
					<form class="container" action="addacademy.php" method="post">
						<div class="row">
  							<div class="input-field col s12">
    							<select name="degree" required>
      								<option value="" selected>Choose Your Degree</option>
      								<option value="SSC">10<sup>th<sup></option>
      								<option value="Diploma">Deplamo</option>
      								<option value="Intermediate">Intermediate</option>
      								<option value="B-Tech">B-Tech</option>
    							</select>								
	 						</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 13">
								<input type="text" name="start" id="duration" class="date" required>
								<label for="duration">Start Year</label>
							</div>
							<div class="input-field col s12 m6 13">
								<input type="text" name="end" id="duration" class="date" required>
								<label for="duration">End Year</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" name="percentage" id="percentage" class="validate" required>
								<label for="percentage">Percentage</label>
							</div>
						</div>
						<div class="right">
							<button class="btn-flat" name="submit" style="border:1px solid black;border-radius:16px;padding:0px 20px 0px 20px;" type="submit">save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="training">
			<div class="row">
				<div class="col s12 m12 13" style="">
					<h3 class="thin" style="position: absolute;">Workshops</h3>
					<p class="right" style="margin-top:40px;"><a id="model"  href="#modal3" class="btn-flat z-depth-0 modal-trigger" style="text-align:center;border-radius:16px;padding:0px 30px 0px 30px; border:1px solid #2196F3;">ADD</a></p>
				</div>
			</div>
			<div class="training_content">
				<?php
					$workshop = "SELECT * FROM workshop WHERE id='$id'";
					$workshop_query = mysqli_query($conn,$workshop) or die(mysqli_error($conn));
					$workshops_count = mysqli_num_rows($workshop_query);

					while($rows = mysqli_fetch_array($workshop_query))
					{
				?>
				<div class="row">
					<div class="col s12 m12 13">
						<p class="" style="font-weight:bold;" name="Domain_name">
								<?php echo $rows['workshop_name']; ?>
							<a href="#update3<?php echo $rows['workshop_id']; ?>" class="btn-flat right modal-trigger"><i class="material-icons small">create</i></a>
							<a href="#delete3<?php echo $rows['workshop_id']; ?>" class="right btn-flat modal-trigger"><i class="material-icons small">delete</i></a>
						</p>
						<p class="thin" style="margin:0;padding:0px;"><?php echo $rows['oragnizer']; ?></p>
						<p><i class="material-icons small" style="font-size: 1rem;">query_builder</i><?php echo $rows['start_date']; ?>-<?php echo $rows['end_date']; ?></p>
						<p name="description" style="margin:0;padding:0;font-size:14px;text-align: justify;text-justify:inter-word;">
							<?php echo $rows['description']; ?>
						</p>
					</div>
				</div>
				<div class="modal" id="update3<?php echo $rows['workshop_id']; ?>" style="max-height:90%;width:65%;outline: none;">
					<div class="modal-content">
						<h5 class="center" style="font-weight:100;">Add Workshop</h5>
						<form class="container" action="addworkshop.php" method="post">
							<input type="hidden" name="id" value="<?php echo $rows['workshop_id']; ?>">
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" id="domain_name" value="<?php echo $rows['workshop_name']; ?>" name="domain_name" class="validate" required>
									<label for="domain_name">Domain Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" id="organization_name" value="<?php echo $rows['oragnizer']; ?>" name="organization_name" class="validate" required>
									<label  for="organization_name">Oraganization</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6 13">
									<input type="text" name="start" value="<?php echo $rows['start_date']; ?>" id="duration" class="datepicker" required>
									<label for="duration">Start Date</label>
								</div>
								<div class="input-field col s12 m6 13">
									<input type="text" name="end" value="<?php echo $rows['end_date']; ?>" id="duration" class="datepicker" required>
									<label for="duration">End Date</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<textarea id="description" name="description" class="materialize-textarea" data-limit="500" required><?php echo $rows['description']; ?></textarea>
									<label for="description">Description</label>
								</div>
							</div>
							<div class="right">
								<button type="submit" name="submit" class="btn-flat z-depth-0" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</button>
							</div>
						</form>
					</div>
				</div>
				<div class="modal" id="delete3<?php echo $rows['workshop_id']; ?>" >
					<div class="modal-content">
						<form action="addworkshop.php" method="post">
							<input type="hidden" name="deleteid" value="<?php echo $rows['workshop_id']; ?>">
							<p>Are you sure you want to delete?</p>
							<button name="delete" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Delete</button>
						</form>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<div class="modal" id="modal3" style="max-height:90%;width:65%;outline: none;">
				<div class="modal-content">
					<h5 class="center" style="font-weight:100;">Add Workshop</h5>
					<form class="container" action="addworkshop.php" method="post">
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" id="domain_name" name="domain_name" class="validate" required>
								<label for="domain_name">Domain Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" id="organization_name" name="organization_name" class="validate" required>
								<label  for="organization_name">Oraganization</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 13">
								<input type="text" name="start" id="duration" class="datepicker" required>
								<label for="duration">Start Date</label>
							</div>
							<div class="input-field col s12 m6 13">
								<input type="text" name="end" id="duration" class="datepicker" required>
								<label for="duration">End Date</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<textarea id="description" name="description" class="materialize-textarea" data-limit="500" required></textarea>
								<label for="description">Description</label>
							</div>
						</div>
						<div class="right">
							<button type="submit" name="submit" class="btn-flat z-depth-0" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="certification">
			<div class="row">
				<div class="col s12 m12 13" style="">
					<h3 class="thin" style="position: absolute;">Certification</h3>
					<p class="right" style="margin-top:40px;"><a id="model"  href="#modal4" class="btn-flat z-depth-0 modal-trigger" style="text-align:center;border-radius:16px;padding:0px 30px 0px 30px; border:1px solid #2196F3;">ADD</a></p>
				</div>
			</div>
			<div class="certification_content">
				<?php
					$certificate = "SELECT * FROM certifications WHERE id = '$id'";
					$certificate_query = mysqli_query($conn,$certificate) or die(mysqli_error($conn));

					$certificate_count = mysqli_num_rows($certificate_query);
					while($rows = mysqli_fetch_array($certificate_query))
					{
				?>
				<div class="row">
					<div class="col s12 m12 13">			
						<table class="striped center">
					        <thead >
          						<tr>
          							<th class="center">Certification No</th>
              						<th class="center">Skill</th>
					              	<th class="center">Organized By</th>
					              	<th class="center">Year</th>
					              	<th class="center">Edit/Remove</th>
          						</tr>
        					</thead>
					        <tbody>
          						<tr>
          							<td class="center"><?php echo $rows['cerification_no']; ?></td>
            						<td class="center"><?php echo $rows['skill']; ?></td>
            						<td class="center"><?php echo $rows['organized_by']; ?></td>
            						<td class="center"><?php echo $rows['year']; ?></td>
            						<td class="center">
		         						<a href="#update4<?php echo $rows['cerification_id']; ?>" class="btn-flat modal-trigger"><i class="material-icons small">create</i></a>
										<a href="#delete4<?php echo $rows['cerification_id']; ?>" class="btn-flat modal-trigger"><i class="material-icons small">delete</i></a>	
            						</td>
          						</tr>
        					</tbody>
      					</table>
					</div>
				</div>
				<div class="modal" id="update4<?php echo $rows['cerification_id']; ?>" style="height: 100%;width:50%;outline:none;">
					<div class="modal-content">
						<h5 class="center" style="font-weight:100;">Add certification</h5>
						<form class="container" action="addcertificate.php" method="post">
							<input type="hidden" name="updateid" value="<?php echo $rows['certificate_id']; ?>">
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" id="c_no" name="certification_no" value="<?php echo $rows['cerification_no']; ?>" required>
									<label for="c_no"></label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" name="skill_name" value="<?php echo $rows['skill']; ?>" class="validate" id="skill_name" required>
									<label for="skill_name">Skill</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" name="organized_name" value="<?php echo $rows['organized_by']; ?>" class="validate" id="organized_name" required>
									<label for="organized_name">Organized By</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" name="year" value="<?php echo $rows['year']; ?>" class="validate" id="year" required>
									<label for="year">Year</label>
								</div>
							</div>
							<div class="right">
								<button type="submit" name="submit" class="btn-flat z-depth-0" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</button>
							</div>
						</form>
					</div>
				</div>
				<div class="modal" id="delete4<?php echo $rows['cerification_id']; ?>" >
					<div class="modal-content">
						<form action="addworkshop.php" method="post">
							<input type="hidden" name="deleteid" value="<?php echo $rows['certificate_id']; ?>">
							<p>Are you sure you want to delete?</p>
							<button name="delete" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Delete</button>
						</form>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<div class="modal" id="modal4" style="height: 100%;width:50%;outline:none;">
				<div class="modal-content">
					<h5 class="center" style="font-weight:100;">Add certification</h5>
					<form class="container" action="addcertificate.php" method="post">
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" id="c_no" name="certification_no" value="<?php echo $rows['cerification_no']; ?>" required>
								<label for="c_no">Certificate No</label>
							</div>
						</div>						
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" name="skill_name" class="validate" id="skill_name" required>
								<label for="skill_name">Skill</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" name="organized_name" class="validate" id="organized_name" required>
								<label for="organized_name">Organized By</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" name="year" class="validate" id="year" required>
								<label for="year">Year</label>
							</div>
						</div>
						<div class="right">
							<button type="submit" name="submit" class="btn-flat z-depth-0" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="internships">
			<div class="row">
				<div class="col s12 m12 13" style="">
					<h3 class="thin" style="position: absolute;">Internships</h3>
					<p class="right" style="margin-top:40px;"><a id="model"  href="#modal5" class="btn-flat z-depth-0 modal-trigger" style="text-align:center;border-radius:16px;padding:0px 30px 0px 30px; border:1px solid #2196F3;">ADD</a></p>
				</div>
			</div>
			<div class="intership_content">
				<?php
					$intern = "SELECT * FROM internships WHERE id = '$id'";
					$intern_query = mysqli_query($conn,$intern) or die(mysqli_error($conn));
					$intern_count = mysqli_num_rows($intern_query);

					while($rows = mysqli_fetch_array($intern_query))
					{
				?>
				<div class="row">
					<div class="col s12 m12 13">
						<form action="" method="post">
							<p class="" style="font-weight:bold;" name="Domain_name">
								<?php echo $rows['intern_name']; ?>
								<a href="#interupdate<?php echo $rows['intern_id']; ?>" class="btn-flat right modal-trigger"><i class="material-icons small">create</i></a>
								<a href="$interdelete<?php echo $rows['intern_id']; ?>" class="right btn-flat modal-trigger"><i class="material-icons small">delete</i></a>
							</p>
						</form>
						<p class="thin" style="margin:0;padding:0px;"><?php echo $rows['organization']; ?> </p>
						<p><i class="material-icons small" style="font-size: 1rem;">query_builder</i>
							<?php echo $rows['start_date']; ?>-<?php echo $rows['end_date']; ?></p>
						<p name="description" style="margin:0;padding:0;font-size:14px;text-align: justify;text-justify:inter-word;">
							<?php echo $rows['description']; ?>
						</p>
					</div>
				</div>
				<div class="modal" id="#interupdate<?php echo $rows['intern_id']; ?>" style="max-height: 150%;width:65%;outline: none;">
					<div class="modal-content">
						<h5 class="center" style="font-weight:100;"></h5>
						<form class="container" action="addinternship.php" method="post">
							<h5 class="center" style="font-weight:100;">Add Internship</h5>
							<input type="hidden" name="internid" value="<?php echo $rows['intern_id']; ?>" >
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" id="domain_name" name="domain_name" value="<?php echo $rows['intern_name']; ?>" class="validate" required>
									<label for="domain_name">Domain Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<input type="text" id="organization_name" value="<?php echo $rows['organization']; ?>" name="organization_name" required class="validate">
									<label  for="organization_name">Oraganization</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6 13">
									<input type="text" name="start" value="<?php echo $rows['start_date']; ?>" id="duration" class="datepicker" required>
									<label for="duration">Start Date</label>
								</div>
								<div class="input-field col s12 m6 13">
									<input type="text" name="end" id="duration" value="<?php echo $rows['end_date']; ?>" class="datepicker" required>
									<label for="duration">End Date</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 13">
									<textarea id="description" name="description" class="materialize-textarea" data-limit="500" required><?php echo $rows['description']; ?></textarea>
									<label for="description">Description</label>
								</div>
							</div>
							<div class="right">
								<button type="submit" name="submit" class="btn-flat z-depth-0" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</button>
							</div>
						</form>
					</div>
				</div>
				<div class="modal" id="interdelete<?php echo $rows['intern_id']; ?>" >
					<div class="modal-content">
						<form action="addinternship.php" method="post">
							<input type="hidden" name="deleteid" value="<?php echo $rows['intern_id']; ?>">
							<p>Are you sure you want to delete?</p>
							<button name="delete" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Delete</button>
						</form>
					</div>
				</div>			
				<?php
					}
				?>
			</div>
			<div class="modal" id="modal5" style="max-height: 150%;width:65%;outline: none;">
				<div class="modal-content">
					<h5 class="center" style="font-weight:100;"></h5>
					<form class="container" action="addinternship.php" method="post">
						<h5 class="center" style="font-weight:100;">Add Internship</h5>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" id="domain_name" name="domain_name" class="validate" required>
								<label for="domain_name">Domain Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input type="text" id="organization_name" name="organization_name" class="validate" required>
								<label  for="organization_name">Oraganization</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 13">
								<input type="text" name="start" id="duration" class="datepicker" required>
								<label for="duration">Start Date</label>
							</div>
							<div class="input-field col s12 m6 13">
								<input type="text" name="end" id="duration" class="datepicker" required>
								<label for="duration">End Date</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<textarea id="description" name="description" class="materialize-textarea" data-limit="500" required></textarea>
								<label for="description">Description</label>
							</div>
						</div>
						<div class="right">
							<button type="submit" name="submit" class="btn-flat z-depth-0" style="border:1px solid black;border-radius: 16px;padding:0px 20px 0px 20px;">save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="social_links">
			<?php
				$social = "SELECT * FROM sociallink WHERE id='$id'";
				$social_query = mysqli_query($conn,$social) or die(mysqli_error($conn));

				while($row = mysqli_fetch_array($social_query))
				{
			?>
			<div class="row">
				<div class="col s3 m1 13 center" style="padding:30px 0px 30px 0px;">
					<div class="circle z-depth-1" style="border:1px solid #29487d;background-color:#29487d;width:60px;height:60px;margin:20px 0px 0px 0px ;">
						<a href="<?php echo $row['facebook']; ?>"><p class="center" style="margin-top:10px;background-color:"><span style="font-weight:bold;font-size:25px;color:white;">f</span></p></a>
					</div>				
				</div>
				<div class="col s3 m1 13 center" style="padding:30px 0px 30px 0px;">
					<div class="circle z-depth-1 " style="border:1px solid #2196F3;background-color:#2196F3;width:60px;height:60px;margin:20px 0px 0px 0px ;">
						<a href="<?php echo $row['twitter']; ?>"  style="margin-top:20px;background-color: ;font-size:20px;font-weight: bold;color:white;" class="fa fa-twitter"></a>
					</div>				
				</div>
				<div class="col s3 m1 13 center" style="padding:30px 0px 30px 0px;">
					<div class="circle z-depth-1 " style="border:1px solid #d32f2f;background-color:#d32f2f;width:60px;height:60px;margin:20px 0px 0px 0px ;">
						<a href="<?php echo $row['googleplus']; ?>"  style="margin-top:20px;background-color: ;font-size:20px;font-weight: bold;color:white;" class="fa fa-google"> +</a>
					</div>				
				</div>
			</div>
			<?php
				}
			?>
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
    	$('.datepicker').datepicker();
    	$('.modal').modal();
    	$('.dropdown-trigger').dropdown();
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
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
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