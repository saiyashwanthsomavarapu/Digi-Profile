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
      <form action="php.php" method="post">
        <div class="col s12 m6 13" >
          <div class="row" id="topbarsearch">
            <div class="input-field col s8  red-text">
             	<i class="red-text material-icons prefix">search</i>
              <input type="text" name="key" placeholder="search by id" id="autocomplete-input" class="autocomplete red-text" >
            </div>
          </div>
          <button class="btn-flat" name="submit" style="border:1px solid black;border-radius: 16px;">search</button>
        </div>
      </form>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>