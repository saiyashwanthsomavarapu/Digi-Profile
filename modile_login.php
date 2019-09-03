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
        <style type="text/css">
       	body {
			background: #f5f5f5;
		}
		h5 {
			font-weight: 400;
		}
		.container {
			margin-top: 80px;
			width: 400px;
			height: 700px;
		}
		.tabs .indicator {
			background-color: #e0f2f1;
			height: 60px;
			opacity: 0.3;
		}
		.form-container {
			padding: 40px;
			padding-top: 10px;
		}
		.confirmation-tabs-btn {
			position: absolute;
		}
        </style>
    </head>
    <body>

		<div class="container white">
			<ul class="tabs blue">
				<li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
				<li class="tab col s3"><a class="white-text" href="#register">register</a></li>
			</ul>
			<div id="login" class="col s12">
				<form class="col s12" action="login.php" method="post">
					<div class="form-container">
						<h3 class="">Login</h3>
						<div class="row">
							<div class="input-field col s12">
								<input id="email" name="email" type="email" class="validate" required>
								<label for="email">Email</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="password" name="password" type="password" class="validate" required>
								<label for="password">Password</label>
							</div>
						</div>
						<br>
						<center>
							<button class="btn-flat" style="border:1px solid black;border-radius:16px;" type="submit" name="submit">Login</button>
							<br>
							<br>
							<a href="">Forgotten password?</a>
						</center>
					</div>
				</form>
			</div>
			<div id="register" class="col s12">
				<form class="col s12" action="register.php" method="post">
					<div class="form-container">
						<h3 class="">Register</h3>
						<div class="row ">
							<div class="input-field col s12 m6 13">
								<input id="icon_prefix" type="text" name="first_name" class="validate"required>
								<label for="icon_prefix">First Name</label>
							</div>		
							<div class="input-field col s12 m6 13">
								<input id="icon_prefix" type="text" name="last_name" class="validate" required>
								<label for="icon_prefix">Last Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 13">
								<input id="icon_prefix" type="text" name="roll" class="validate" required>
								<label for="icon_prefix">Rollno</label>
			            	</div>
						</div>
			            <div class="row">
			            	<div class="input-field col s12 m12 13">
			                	<input id="icon_prefix" type="email" name="email" class="validate" required>
			                	<label for="icon_prefix">Email</label>
			            	</div>
			            </div>
						<div class="row">
							<div class="input-field col s12 m6 13">
								<input id="icon_prefix" type="password" name="password" class="validate" required>
								<label for="icon_prefix">Password</label>
							</div>
							<div class="input-field col s12 m6 13">
								<input id="icon_prefix" type="password" name="cpassword" class="validate" required>
								<label for="icon_prefix">Repeat Password</label>
							</div>
						</div>
						<center>
							<button class="btn-flat" style="border:1px solid black;border-radius:16px;" type="submit" name="submit">Submit</button>
						</center>
					</div>
				</form>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				 $('.tabs').tabs();
			})
		</script>
	      <script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>