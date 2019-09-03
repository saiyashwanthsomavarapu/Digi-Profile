
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
</head>
<body>
<div class="container">
	<div class="row">
		<div class="" style="padding:30px;">
			<h3 class="center">Admin Panel</h3>
		</div>
		<div class="divider"></div>
		<div class="col s12 m12 13 center">
			<form class="container center" action="adminloginp.php" method="POST">
				<div class="row">
					<div class="input-field col s12 m12 13">
						<input type="email" name="email" id="emai" class="validate">
						<label for="email">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m12 13">
						<input type="password" name="password" id="password" class="validate">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="">
					<button type="submit" class="btn-flat" name="submit" style="border:1px solid black;border-radius:16px;">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>