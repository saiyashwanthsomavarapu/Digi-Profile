<?php
include('config.php');
session_start();
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
        .change_background {

            background-color: #3591cc;
            background-color: white; /*rgba(53,145,204,0.75);*/
            -webkit-transition: background-color 2s;
            transition: background-color 2s;
        }
        </style>
    </head>
    <body>
        <section>
            <nav class=" onscroll transparent" style="position:fixed;z-index: 1;box-shadow: none;-webkit-transition:background-color 2s; transition: background-color 2s;">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo textcolor hide-on-med-and-down" style="padding:0px;">
                        <img class="img-responsive" src="logo.png" width="80" height="80">
                    </a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger white-text"><i class="material-icons">menu</i></a>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <?php
                if(!@$_SESSION['email'])
                {
                ?>
                <li><a href="modile_login.php">Login & Register</a></li>
                <?php
                }
                else
                {
                ?>
                <li><a href="kick.php">Dashboard</a></li>
                <li><a href="dash.php">Profile</a></li>
                <li><a href="accountsettings.php">Account Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
                <?php
                }
                ?>
            </ul>
            <div class="carousel carousel-slider center" style="background-image: url('shutterstock_202096588.jpg');background-size: cover;  background-position: center center; background-repeat: no-repeat;box-shadow:1px 1px 10px black;height:400px;">
                <div class="carousel-item white-text" href="#one!">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col s12 m6 13 center" style="" >
                            <p  style="font-weight:bold; font-size:60px;padding:70px;" class="center">DIGI PROFILE
                            <br><span class="thin" style="font-size:20px;position: absolute;">-Beyond You</span></p>
                        </div>
                        <?php
                        if(!@$_SESSION['email'])
                        {
                        ?>
                        <div class="col s12 m6 13 hide-on-med-and-down" style="padding:50px;">
                            <form class="container" action="login.php" method="post">
                                <div class="row z-depth-4"  style="padding:10px;background-color:white;border-radius:10px;">
                                    <p class="center black-text" style="font-size:30px;font-weight:bold;margin:0;border-bottom:1px solid #e0e0e0;padding:0px 0px 10px 0px; "> Login Here</p>
                                    <div class="input-field col s12 m12 13">
                                        <input class="validate" type="email" placeholder="Email Id" name="email" id="email" required>
                                    </div>
                                    <div class="input-field col s12 m12 13">
                                        <input class="validate" type="password" name="password" placeholder="Password" id="password" required>
                                        <small><a href="#forget" class="right modal-trigger">Forget password?</a></small>
                                    </div>
                                    <div class="button ">
                                        <button type="submit" name="submit" class="btn z-depth-0 primary" style="margin-left:30px;padding:0px 20px 0px 20px;border-radius:16px;">Login</button>
										<a class="btn z-depth-1 primary modal-trigger" href="#modal1" style="padding:0px 20px 0px 20px;border-radius:16px">Sign Up</a>
										
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="features" style="margin-top:50px;margin-bottom:100px;">
                  
			<div class="row">
                        <div class="col s12 m6 13 center" >
                            <i class="material-icons large " style="margin-top:55px;color:#154360;">person</i>
                            <h4 >Developers</h4>
                            <h5>Practice, Compete, Find Jobs</h5>
                        </div>
                        <div class="col s12 m6 13 center" >
                            <i class="material-icons large " style="margin-top:55px;color:#154360;">people</i>
                            <h4 >Companies</h4>
                            <h5>Assess, Screen, Interview</h5>
                        </div>
				</div>
			</div>
                <div class="divider"></div>
                
               <div class="row" style="padding:20px 0px 40px 0px;">
                    <h3 class="thin center" style="padding:0px 0px 15px 0px;">About Project</h3>
                    <div class="col s12 m6 13">
                        <p style="text-align: justify;text-justify:inter-word;">
                           Digi profile is a unique approach to individual careers. Digiprofiling is usually done in the form of phases where a person enrolls himself and describes his own abilities and the level of excellence. Then he will be taking a test according to his availability of time and place and then he will be given a grading according to his score and experience. The main objective of this project is to show the list of students who are knowledgeable over a particular technology which makes easy for a company to hire a student who have related skills which might company looking for.                       </p>
                    </div>
                    <div class="col s12 m6 13">
                        <div class="video-container">
                            <iframe width="853" height="580" src="//www.youtube.com/embed/FeXFu2zHqSs?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
	        
    	</section>
        <div class="container">
			<div class="divider"></div>
            <div class="row" style="padding:20px 0px 40px 0px;">
				<h3 class="thin center" style="padding:0px 0px 15px 0px;">Our Team</h3>
                <div class="col s12 m3 13 center ">
                    <img src="Uploads/sai.jpg" width="100" height="100" class="img-responsive circle">
                    <p class="center" style="font-size:20px;">sai yaswanth</p>
                </div>
                <div class="col s12 m3 13 center">
                    <img src="Uploads/kiran.jpg" width="100" height="100" class="img-responsive circle">
                    <p class="center" style="font-size:20px;">Kiran</p>
                </div>
                <div class="col s12 m3 13 center">
                    <img src="Uploads/candy.jpg" width="100" height="100" class="img-responsive circle">
                    <p class="center" style="font-size:20px;">Gayathri</p>
                </div>
                <div class="col s12 m3 13 center">
                    <img src="Uploads/haritha.jpg" width="100" height="100" class="img-responsive circle">
                    <p class="center" style="font-size:20px;">Haritha</p>
                </div>
            </div>
        </div>
        <footer style="padding-top:50px;padding-bottom:50px;background-color:#D0D3D4;">
            <div class="center">
                <h3 class="thin">DIGI PROFILE</h3>
                <small style="position:relative">Designed by skydo's </small>
            </div> 
        </footer>

	<div id="modal1" class="modal" style="height:150%;width:65%;">
		<div class="modal-content center">
			<form class="container" action="register.php" method="post">
			<h4>SignUp Here</h4>
			<div class="row ">
            
			<div class="input-field col s12 m6 13">
				<i class="material-icons prefix">account_circle</i>
				<input id="icon_prefix" type="text" name="first_name" class="validate" required>
				<label for="icon_prefix">First Name</label>
			</div>
			
			
			<div class="input-field col s12 m6 13">
				<i class="material-icons prefix">account_circle</i>
				<input id="icon_prefix" type="text" name="last_name" class="validate" required>
				<label for="icon_prefix">Last Name</label>
			</div>
			</div>
			<div class="row">
			<div class="input-field col s12 m12 13">
				<i class="material-icons prefix">email</i>
				<input id="icon_prefix" type="text" name="roll" class="validate" required>
				<label for="icon_prefix">Rollno</label>
            </div>
			</div>

            <div class="row">
            <div class="input-field col s12 m12 13">
                <i class="material-icons prefix">email</i>
                <input id="icon_prefix" type="email" name="email" class="validate" required>
                <label for="icon_prefix">Email</label>
            </div>
            </div>
			
			<div class="row">
				<div class="input-field col s12 m6 13">
				<i class="material-icons prefix">lock</i>
				<input id="icon_prefix" type="password" name="password" class="validate" required>
				<label for="icon_prefix">Password</label>
			</div>
			<div class="input-field col s12 m6 13">
				<i class="material-icons prefix">lock</i>
				<input id="icon_prefix" type="password" name="cpassword" class="validate" required>
				<label for="icon_prefix">Repeat Password</label>
			</div>
			</div>
			<button type="submit" class="btn z-depth-0 right"  name="submit" style="padding:0px 20px 0px 20px;border-radius:16px;">SignUp</button>
			</form>
		</div>
	</div>
    <div class="modal" id="forget">
        <div class="modal-content">
            <form action="forget.php" method="post">
                <div class="row">
                    <div class="input-field col s12 m12 13">
                        <input type="email" class="validate" id="dataset" name="dataset" required>
                        <label for="dataset">Enter Email</label>
                    </div>
                </div>
                <div class="right">
                    <button class="btn-flat" name="submit" style="border:1px solid black;border-radius:16px;">send
                    </button>
                </div>
            </form>
        </div>
    </div>
            
        <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                if (scroll >= 50) 
                {
                    $('.onscroll').removeClass('transparent').addClass("change_background");
                    $('.textcolor').addClass('black-text');
                }
                else 
                {
                    $('.onscroll').removeClass("change_background").addClass('transparent');
                    $('.textcolor').removeClass('black-text');
                }
            });

            $('.sidenav').sidenav();
			$('.modal').modal();

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                fullHeight: 1000,
                indicators: true
             });
        });
        </script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>