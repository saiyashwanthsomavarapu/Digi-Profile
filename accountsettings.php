<?php
include('config.php');

session_start();

if($_SESSION['email'])
{
	$id = $_SESSION['id'];
	$email = $_SESSION['email'];
  $fisrtname = $_SESSION['first_name'];
  $lastname = $_SESSION['last_name'];
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

    <link rel="stylesheet" href="owl.carousel.min.css">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="owl.carousel.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
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
    .tabs .indicator{
    		background-color: #2196F3;
    	}
    .tabs .tab a:focus, .tabs .tab a:focus.active{
    		background-color: white;
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
  	<section class="Settings">
  		<div class="headings">
	  		<div class="row">
	  			<div class="container">
	  			<div class="col s12 m12 13" style="padding:0px 0px 0px 0px;">
	  				<p class="thin"  style="font-size:30px;">Account Settings</p>
	  			</div>
	  			</div>
	  		</div>
  		</div>
  		<div class="divider"></div>
      <div class="main_settings" style="padding-bottom:30px;">
  			<div class="container">
          <div class="row">
  					<div class="col s12 m3 13 hide-on-small-only" style="max-height: 100%;">
  						<ul>
  							<li style="line-height: 40px;"><a id="ps" class="black-text" href="#profile_settings">Profile</a></li>
  							<li style="line-height: 40px;"><a id="dp" class="black-text" href="#picture_settings">Picture</a></li>
                <li style="line-height: 40px;"><a id="sm" class="black-text" href="#social_settings">Social Media</a></li>
  						</ul>
  					</div>
            <div id="profile_settings" class="col s12 m9 13" style="padding-top:20px;">
  						<?php
  							$update_pro = "SELECT * FROM register WHERE id='$id'";
  							$pro_query = mysqli_query($conn,$update_pro) or die(mysqli_error($conn));
  							while($rows=mysqli_fetch_array($pro_query))
  							{
  						?>
  						<form action="updateprofile.php" method="post">
                <div class="row">
                  <div class="input-field col s12 m8 13">
                    <input type="text" name="username" value="<?php echo $fisrtname.' '.$lastname; ?>" readonly id="username">
                    <label for="username">Username</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m8 13">
                    <input type="text" name="dob"  placeholder="DD-MM-YYYY" value="<?php echo $rows['dateofbirth']; ?>" id="dateofbirth">
                    <label for="dateofbirth">Date of Birth</label>
                  </div>
                </div>
	  						<div class="row">
	  							<div class="input-field col s12 m8 13">
	  								<input type="text" name="phone" value="<?php echo $rows['phone']; ?>" placeholder="+91XXXXXXXXXX" id="phone">
	  								<label for="phone">Phone Number</label>
	  							</div>
	  						</div>
                <div class="row">
                  <div class="input-field col s12 m8 13">
                    <input type="text" name="location" value="<?php echo $rows['location']; ?>"  id="location">
                    <label for="location">Location</label>
                  </div>
                </div>
	  						<div class="row">
	  							<div class="input-field col s12 m8 13">
	  								<input type="password" name="password" value="<?php echo $rows['password']; ?>" placeholder="******" id="password">
	  								<label for="password">Change Password</label>
	  							</div>
	  						</div>

	  						<div class="right">
	  							<button type="submit" name="submit" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Save Changes</button>
	  						</div>
  						</form>
  						<?php
  							}
  						?>
  					</div>
  					<div id="picture_settings" class="col s12 m9 13">	
  					  <h3></h3>
  						<?php
  							$image ="SELECT image FROM register WHERE id='$id'";
  						  $image_query = mysqli_query($conn,$image) or die(mysqli_error($conn));
  							while($rows = mysqli_fetch_array($image_query))
  							{
  						?>
  						<div class="row">
  							<div class="col s12 m8 13">
							    <img class="circle img-responsive" id="getimg" src="uploads/<?php echo $rows['image']; ?>" width="100" height="100">
							    </div>
							</div>
							<?php
								}
							?>
						  <form action="image.php" method="post" enctype="multipart/form-data">
							  <div class="row">
							    <div class="file-field input-field col s12 m8 13 "> 
							      <div class="btn-flat center col s12 m4 13" style="border:1px solid black;border-radius:16px;">
							        <span>File</span>
							        <input type="file" max-size="200000000" name="file">
							      </div>
  								</div>
  							</div>
  							<div class="right">
  								<button class="btn-flat" name="submit" id="gg" style="border:1px solid black;border-radius:16px;">click</button>
  							</div>
  						</form>
  					</div>
            <div id="socail_settings" class="col s12 m9 13">
              <?php
                $social = "SELECT * FROM sociallink WHERE id='$id'";
                $social_query = mysqli_query($conn,$social) or die(mysqli_error($conn));
                while($social_fetch = mysqli_fetch_array($social_query))
                {
              ?>
                  <form action="social_media_links.php" method="post">
                    <div class="row">
                      <div class="col s12 m3 13">
                      </div>
                      <div class="col s12 m9 13">
                        <h3 class="thin">Social Media</h3>
                        <div class="row">
                          <div class="input-field col s12 m8 13">
                            <input type="text" name="facebook_link" value="<?php echo $social_fetch['facebook']; ?>"  placeholder="http://www.facebook.com/xxx" id="facebook">
                            <label for="facebook">Facebook</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12 m8 13">
                            <input type="text" name="twitter_link" value="<?php echo $social_fetch['twitter']; ?>" placeholder="http://www.twitter.com/xxx" id="twitter">
                            <label for="twitter">Twitter</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12 m8 13">
                            <input type="text" name="linkedin_link" value="<?php echo $social_fetch['linkedin']; ?>" placeholder="http://www.linkedin.com/xxx" id="linkedin">
                            <label for="linkedin">Linkedin</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12 m8 13">
                            <input type="text" name="googleplus_link" placeholder="http://www.googleplus.com/xxx" value="<?php echo $social_fetch['googleplus']; ?>" id="googleplus">
                            <label for="googleplus">Google Plus</label>
                          </div>
                        </div>
                        <div class="right">
                          <button type="submit" id="social_btn" name="submit" class="btn-flat z-depth-0" style="  border:1px solid black;border-radius:16px;">Save Changes</button>
                        </div>
                      </div>
                    </div>
                  </form>
              <?php
                }
              ?>
            </div>
          </div>
  			</div>
  		</div>
  	</section>
    <footer style="padding-top:80px;padding-bottom:50px;background-color:#eeeeee;">
        <div class="center">
            <h3 class="thin">DIGI PROFILE</h3>
            <small style="position:relative">Designed by skydo's </small>
        </div> 
    </footer>
    <script type="text/javascript">
      	$(document).ready(function(){
      		$('.sidenav').sidenav();
      		$('.dropdown-trigger').dropdown();
          $('#picture_settings').hide();
          $('#socail_settings').hide();
    		$('#ps').click(function(){
    			$('#profile_settings').show();
    			$('#picture_settings').hide();
          $('#socail_settings').hide();
    		});
    		$('#dp').click(function(){
    			$('#picture_settings').show();
    			$('#profile_settings').hide();
          $('#socail_settings').hide();
    		});
        $('#sm').click(function(){
          $('#picture_settings').hide();
          $('#profile_settings').hide();
          $('#socail_settings').show();
        });
  		});
    </script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>