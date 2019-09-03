<?php
include('config.php');

session_start();

if($_SESSION['emailadmin'])
{
  $firstname = $_SESSION['adminfirst_name'];
  $lastname = $_SESSION['adminlast_name'];
}
else
{
  header('Location:adminlogin.php');
}


// else
// {
//   $sql = "SELECT * FROM register";
//   $sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
//   $sql_fetch = mysqli_num_rows($sql_query);
// }
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
  #topbarsearch .input-field .prefix { 
    width:0rem !important;    
  }        
  #topbarsearch nav ul li:hover, nav ul li.active {
    background-color: none !important;
  }
  .input-field .prefix ~ input, .input-field .prefix ~ textarea, .input-field .prefix ~ label, .input-field .prefix ~ .validate ~ label, .input-field .prefix ~ .autocomplete-content{
    margin-left: 2rem !important;
  }
	</style>	
</head>
<body>
	<div class="navbar-fixed">
		<nav class="white" style="box-shadow:0px 0px 0.01px white;">
	    <div class="nav-wrapper">
        <a href="#!" class="brand-logo black-text" style="padding:0px;">
          <img class="img-responsive" alt="avathar.png" src="logo.png" width="65" height="60">   
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
  <div class="container">
		<div class="center row">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="col s12 m6 13" >
          <div class="row" id="topbarsearch">
            <div class="input-field col s8  red-text">
             	<i class="red-text material-icons prefix">search</i>
              <input type="text" name="key" placeholder="search by id" id="autocomplete-input" class="autocomplete red-text" >
            </div>
            <div class="input-field col s4 m4 13 center" style="margin:0;padding:20px 0px 0px 0px;outline:none;">
              <select class="browser-default" name="search_by" style="border:1px solid grey;border-radius: 0px 0px 0px 0px;outline: none;">
                <option value="0" selected>Search By</option>
                <option value="roll">Roll No</option>
                <option value="skill_name">Skill</option>
              </select>
            </div>
          </div>
          <button class="btn-flat" name="submit" style="border:1px solid black;border-radius: 16px;">search</button>
        </div>
      </form>
      <div class="col s12 m6 13">
        <?php
          if(isset($_POST['submit']))
          {
            $val = $_POST['key'];
          ?>
            <form action="excelp.php" method="post">
              <div class="row" style="padding: 30px;">
                <input type="hidden" name="key" value = "<?php echo $val; ?>">
                <button href="excelp.php?id=<?php echo $val; ?>" name="submit" class="btn-flat" style="border:1px solid black;border-radius:16px;">generate</button>
              </div>
            </form>
        <?php
          }
        ?>
      </div>
    </div> 
    <table class="striped" style="margin:20px 0px 100px 0px;">
      <thead>
        <tr>
          <th>S.NO</th>
        	<th>STUDENT NAME</th>
          <th>STUDENT ID</th>
          <th>VIEW</th>
          <th>EDIT</th>
          <th>DELETE</th>
	      </tr>
      </thead>
      <tbody>
        <?php
          if(isset($_POST['key']))
          {
            $key = $_POST['key'];
            $search_by = $_POST['search_by'];
            if($search_by == 'skill_name')
            {
              $key_search = "SELECT * FROM skills WHERE skill_name='$key'";
              $key_query  = mysqli_query($conn,$key_search) or die(mysqli_error($conn));
              $i=0;
              while($key_fetch = mysqli_fetch_array($key_query))
              {
                $key_id =  $key_fetch['id'];
                $sql = "SELECT * FROM register WHERE id='$key_id'";
                $sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $sql_fetch = mysqli_num_rows($sql_query);
                $rows = mysqli_fetch_array($sql_query);
        ?>
          	    <tr>
                  <td><?php echo $i=$i+1; ?></td>
                  <td><?php echo $rows['first_name'].' '.$rows['last_name']; ?></td>
                  <td><?php echo $rows['id']; ?></td>
                  <td><a class="btn z-depth-0" href="userview.php?id=<?php echo $rows['id']; ?>" style="margin-left: 0px;padding: 0px 20px 0px 20px;border-radius: 16px;color:#000000;background-color: #ffffff;border:1px solid #000000;">view</a></td>
	                <td><a tuype="submit" class="btn z-depth-0" href="admintedit.php?id=<?php echo $rows['id']; ?>" style="margin-left: 0px;padding: 0px 20px 0px 20px;border-radius: 16px;color:#000000;background-color: #ffffff;border:1px solid #000000;"><i class="material-icons">edit</i></a></td>
            	    <td><a href= "#delete<?php echo $rows['id']; ?>" id="remove" style="border:1px solid black;border-radius:16px;padding:0px 20px 0px 20px;" class=" btn-flat modal-trigger"><i class="material-icons small">delete</i></a></td>
          	    </tr>
                <div class="modal" id="delete<?php echo $rows['id']; ?>">
                  <div class="modal-content">
                    <form action="delete.php" method="post">
                      <input type="hidden" name="deleteid" value="<?php echo $rows['id']; ?>">
                      <p>Are you sure you want to delete this account?</p>
                      <button name="delete" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Delete</button>
                    </form>
                  </div>
                </div>
        <?php
              }
            }
            else if($search_by == 'roll')
            {
              $key_search = "SELECT * FROM skills WHERE id='$key'";
              $key_query  = mysqli_query($conn,$key_search) or die(mysqli_error($conn));
              $i=0;
              $key_fetch = mysqli_fetch_array($key_query);
              
                $key_id =  $key_fetch['id'];
                $sql = "SELECT * FROM register WHERE id='$key_id'";
                $sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $sql_fetch = mysqli_num_rows($sql_query);
                $rows = mysqli_fetch_array($sql_query);
        ?>
                <tr>
                  <td><?php echo $i=$i+1; ?></td>
                  <td><?php echo $rows['first_name'].' '.$rows['last_name']; ?></td>
                  <td><?php echo $rows['id']; ?></td>
                  <td><a class="btn z-depth-0" href="userview.php?id=<?php echo $rows['id']; ?>" style="margin-left: 0px;padding: 0px 20px 0px 20px;border-radius: 16px;color:#000000;background-color: #ffffff;border:1px solid #000000;">view</a></td>
                  <td><a tuype="submit" class="btn z-depth-0" href="admintedit.php?id=<?php echo $rows['id']; ?>" style="margin-left: 0px;padding: 0px 20px 0px 20px;border-radius: 16px;color:#000000;background-color: #ffffff;border:1px solid #000000;"><i class="material-icons">edit</i></a></td>
                  <td><a href= "#delete<?php echo $rows['id']; ?>" id="remove" style="border:1px solid black;border-radius:16px;padding:0px 20px 0px 20px;" class=" btn-flat modal-trigger"><i class="material-icons small">delete</i></a></td>
                </tr>
                <div class="modal" id="delete<?php echo $rows['id']; ?>">
                  <div class="modal-content">
                    <form action="delete.php" method="post">
                      <input type="hidden" name="deleteid" value="<?php echo $rows['id']; ?>">
                      <p>Are you sure you want to delete this account?</p>
                      <button name="delete" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Delete</button>
                    </form>
                  </div>
                </div>
        <?php
              
            }
          }
          else
          {          
            $sql = "SELECT * FROM register ";
            $sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $sql_fetch = mysqli_num_rows($sql_query);
            $i=0;
            while($rows = mysqli_fetch_array($sql_query))
            {
        ?>   
              <tr>
                <td><?php echo $i=$i+1; ?></td>
                <td><?php echo $rows['first_name'].' '.$rows['last_name']; ?></td>
                <td><?php echo $rows['id']; ?></td>
                <td><a class="btn z-depth-0" href="userview.php?id=<?php echo $rows['id']; ?>" style="margin-left: 0px;padding: 0px 20px 0px 20px;border-radius: 16px;color:#000000;background-color: #ffffff;border:1px solid #000000;">view</a></td>
                <td><a tuype="submit" class="btn z-depth-0" href="admintedit.php?id=<?php echo $rows['id']; ?>" style="margin-left: 0px;padding: 0px 20px 0px 20px;border-radius: 16px;color:#000000;background-color: #ffffff;border:1px solid #000000;"><i class="material-icons">edit</i></a>
                </td>
                <td><a href= "#delete<?php echo $rows['id']; ?>" id="remove" style="border:1px solid black;border-radius:16px;padding:0px 20px 0px 20px;" class=" btn-flat modal-trigger"><i class="material-icons small">delete</i></a>
                </td>
              </tr>
              <div class="modal" id="delete<?php echo $rows['id']; ?>">
                <div class="modal-content">
                  <form action="delete.php" method="post">
                    <input type="hidden" name="deleteid" value="<?php echo $rows['id']; ?>">
                    <p>Are you sure you want to delete this account?</p>
                    <button name="delete" class="btn-flat z-depth-0" style="border:1px solid black;border-radius:16px;">Delete</button>
                  </form>
                </div>
              </div>
        <?php
            }
          }
        ?>      
      </tbody>
    </table>
  </div>
    <footer style="padding-top:80px;padding-bottom:50px;background-color:#eeeeee;">
        <div class="center">
            <h3 class="thin">DIGI PROFILE</h3>
            <small style="position:relative">Designed by skydo's </small>
        </div> 
    </footer>
  <script>
  	$(document).ready(function(){
  		$('.sidenav').sidenav();
  		$('.modal').modal();
      $('.dropdown-trigger').dropdown();
        $('input.autocomplete').autocomplete({
            data: {
                    "Java": null,
                    "Javascript": null,
                    "C Language": null,
                    "C++":null,
                    "Python":null,
                    "Ruby":null,
                    "Peral":null,
                    "HTML":null,
                    "CSS3":null,
                    "PHP":null,
                    "MySQL":null,
                    "Postgress":null,
                    "Adobe illustarter":null,
                    "Designing":null,
                    "Ajax":null,
                    "Django":null,
                    "Salesforce":null,
                    "Cisco":null,
                    "Game Developer":null,
                    "Artificial Intelligence":null,
                    "Machine learning":null,
                    "Adobe Postshop":null,
                    "":null,
                    "":null,
              }
        });
  	});
  </script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>