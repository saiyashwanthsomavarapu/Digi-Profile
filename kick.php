<?php
include('config.php');
session_start();
$userid = $_SESSION['id'];
$sql = "SELECT * FROM register WHERE id != '$userid'";
$sql_query = mysqli_query($conn,$sql);
$email = $_SESSION['email'];
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
    img{
    
      /*height:35%;*/
    }
    nav{

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
	        		<li class="center"><a style="outline:none;" class="black-text dropdown-trigger" data-target="dropdown1" href=""><?php echo $email; ?></a></li>
	        		<li><a class="black-text" href=""></a></li>
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

<div class="main">
  <div class="container" style="padding:40px 0px 40px 0px;">
    <div class="row" style="margin:0;">
      <div class="col s12 m2 13">
      </div>
      <div class="col s12 m7 13 center" >
        <?php
          $tnos = mysqli_query($conn,"SELECT * FROM register") or die(mysqli_error($conn));
          $tnos_num = mysqli_num_rows($tnos);
        ?>
        <p>
          <span class="left" style="font-size:20px;font-weight:bold;">Total No.Of Stubents Enrolled</span><span class="center" style="font-size:20px;font-weight: bold;"><?php echo $tnos_num; ?></span>
        </p>
      </div>
      <div class="col s12 m3 13 center" >
      </div>
    </div>    
    <div class="row center">
      <?php
        $skill = mysqli_query($conn,"SELECT * FROM skills WHERE skill_name='python'") or die(mysqli_error($conn));
        $skill_rows = mysqli_num_rows($skill);
      ?>
      <div class="col s12 m3 13 center" style="box-shadow:0px 0px 0.01px grey;padding:20px;margin:0px;">
        <img class="img-responsive" width="100" height="100" src="python.png">
        <p style="font-size:30px;margin: 0;padding:0;">Python</p>
        <p><?php echo $skill_rows; ?></p>
      </div>
      <?php
        $skill1 = mysqli_query($conn,"SELECT * FROM skills WHERE skill_name='cisco'") or die(mysqli_error($conn));
        $skill1_rows = mysqli_num_rows($skill1);
      ?>      
      <div class="col s12 m3 13 center" style="box-shadow:0px 0px 0.01px grey;padding:20px;margin:0px;">
        <img class="img-responsive" width="100" height="100" src="cisco.jpg">
        <p style="font-size:30px;margin: 0;padding:0;">Cisco</p>
        <p><?php echo $skill1_rows; ?></p>
      </div>
      <?php
        $skill2 = mysqli_query($conn,"SELECT * FROM skills WHERE skill_name='salesforce'") or die(mysqli_error($conn));
        $skill2_rows = mysqli_num_rows($skill2);
      ?>
      <div class="col s12 m3 13 center" style="box-shadow:0px 0px 0.01px grey;padding:20px;margin:0px;">
        <img class="img-responsive" width="100" height="100" src="Salesforce1.png">
        <p style="font-size:30px;margin: 0;padding:0;">Salesforce</p>
        <p><?php echo $skill2_rows; ?></p>
      </div>
      <?php
        $skill3 = mysqli_query($conn,"SELECT * FROM skills WHERE skill_name='android'") or die(mysqli_error($conn));
        $skill3_rows = mysqli_num_rows($skill3);
      ?>
      <div class="col s12 m3 13 center" style="box-shadow:0px 0px 0.01px grey;padding:20px;margin:0px;">
        <img class="img-responsive" width="100" height="100" src="android.png">
        <p style="font-size:30px;margin: 0;padding:0;">Android</p>
        <p><?php echo $skill3_rows; ?></p>
      </div>
      <?php
        $skill4 = mysqli_query($conn,"SELECT * FROM skills WHERE skill_name='java'") or die(mysqli_error($conn));
        $skill4_rows = mysqli_num_rows($skill4);
      ?>
      <div class="col s12 m3 13 center" style="box-shadow:0px 0px 0.01px grey;padding:20px;margin:0px;">
        <img class="img-responsive" width="100" height="100" src="java.jpg">
        <p style="font-size:30px;margin: 0;padding:0;">Java</p>
        <p><?php echo $skill4_rows; ?></p>
      </div>
    </div>
  </div>
  <div class="divider"></div>
  <div class="containr" style="padding:30px;">
  	<div class="row">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="col s12 m3 13" >
          <div class="row" id="topbarsearch">
            <div class="input-field col s6 s12 red-text">
              <i class="red-text material-icons prefix">search</i>
              <input type="text" name="key" placeholder="search by id" id="autocomplete-input" class="autocomplete red-text" >
            </div>
          </div>
        </div>
        <div class="col s12 m3 13" style="padding:15px 0px 0px 0px;">
          <button class="btn-flat" name="submit" style="border:1px solid black;border-radius: 16px;">search</button>
        </div>
      </form>
  	</div>
  </div>
  <div class="row">
  	<div class="col s12 m12 13" id="">
  		<div class="containr" style="padding:30px;">	
    		<div class="row">
          <?php
            if(isset($_POST['submit']))
            {
              $search_key = $_POST['key'];
              $search = "SELECT * FROM skills WHERE skill_name='$search_key'";
              $search_query = mysqli_query($conn,$search) or die(mysqli_error($conn));
              $search_count = mysqli_num_rows($search_query);
              while($search_fetch =mysqli_fetch_array($search_query))
              {
          ?>
                <div class="col s12 m3 13">
                  <div class="card small z-depth-0" style="border:1px solid #eeeeee;">
                    <a href="#view?inid=<?php echo $search_fetch['id']; ?>">
                      <div class="card-image" style="max-height: 250px;">
                        <img src="uploads/<?php echo $search_fetch['image']; ?>">
                        <span class="card-title black-text"><?php echo $search_fetch['first_name'].' '.$sql_fetch['last_name']; ?></span>
                      </div>
                    </a>
                    <div class="card-action">
                      <a href="userview.php?id=<?php echo $search_fetch['id']; ?>" id="">View Detailed</a>
                    </div>
                  </div>
                </div>
	    		<?php
              }
            }
            else
            {
	    				while($sql_fetch = mysqli_fetch_array($sql_query))
	    				{
	    		?>
	    			    <div class="col s12 m3 13" style="position:relative;">
	     				    <div class="card small z-depth-0" style="border:1px solid #eeeeee;">
	        				  <a href="#view&inid=<?php echo $sql_fetch['id']; ?>">
	        				    <div class="card-image" style="max-height: 250px;">
	          					  <img src="uploads/<?php echo $sql_fetch['image']; ?>">
	          						<span class="card-title black-text" style="font-weight:300; "><?php echo $sql_fetch['first_name'].' '.$sql_fetch['last_name']; ?></span>
	 	 	      				  </div>
	 	 	      			  </a>
	       					  <div class="card-action">
	          					<a href="userview.php?id=<?php echo $sql_fetch['id']; ?>" id="">View Detailed</a>
<!--                       <a href="#" class="right  center z-depth-1" style="box-shadow:0px 0px 0px black;background-color:#eeeeee;width:10%;height:100%;color:black;"><b>1</b></a> -->
	        				  </div>
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
  </div>
</div>
<footer style="padding-top:50px;padding-bottom:50px;background-color:#D0D3D4;">
  <div class="center">
    <h3 class="thin">DIGI PROFILE</h3>
    <small style="position:relative">Designed by skydo's </small>
  </div> 
</footer>
<script type="text/javascript">
  $(document).ready(function(){
	  		$('select').formSelect();
  			$('.dropdown-trigger').dropdown();
  			$('.sidenav').sidenav();
    		$('.chips').chips({
    		    placeholder: 'Enter a tag',
    			secondaryPlaceholder: '+Tag',
    		});
    		$('#language').change(function(){
    			var choose = $('#language:selected').val();
    			if( choose == 'Other')
    			{
    				$('#hide').show();
    			}
    			else
    			{
    				$('#hide').hide();
    			}
    		});
  		});
  	</script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>