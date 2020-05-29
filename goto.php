<?php 
//this includes the file which needs to be included

	include('important.php');

	if (!ln()) {
		$_SESSION['msg'] = "log in first";
		header('location: login.php');
	}



?>
<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">

</head>
<body> 
	<!-- this is the navabr which contains various option for the data  -->
  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: lightblue">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="images/o.jpg">
          <span class="heading" style="text-decoration-color: orange">COURSE REGISTRATION</span>
        </a>
      </div>

<!-- This is the navigation bar for the user and user can select any of the options -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="welcome.html" style="font-size:20px">HOME
              <span class="sr-only"></span>
            </a>
          </li>
          <li>
            <a href="about.html" style="font-size:20px">ABOUT</a>
          </li>
          <li>
            <a href="make.php" style="font-size:20px">REGISTER</a>
          </li>
          <li>
            <a href="login.php" style="font-size:20px">LOGIN</a>
          </li>
        </ul>
      </div>
   
    </div>
  </nav>
   
	<div class="header">
		<h2></h2>
	</div>
	<section id="home" class="section jumbotron-section bg--position-center no-repeat bg-cover md-display-table" >
  
	<div class="container">
		<!-- if there is an error in the user regiseration it shows error -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
			<br>
		<?php endif ?>
		
		<div class="pf">
		

			<div>
				<?php  
				if (isset($_SESSION['user'])) :
				 ?>
<!-- thus is the user created with the picture of the uset -->
				<div>
				<img height="100" width="100" src="<?php $s = "images/".$_SESSION['user']['imagename']; echo $s; ?>"  >
				</div>

				<div>
					<i><?php echo $_SESSION['user']['username']; ?></i>

					<div>	
						<i  style="color:#888;">(<?php echo ucfirst($_SESSION['user']['type_u']); ?>)</i> 
					</div>
					<br/>
					<div>
						<!-- otherwise user can logout -->
					<a href="goto.php?logout='1'" style="color:blue;">LOG OUT</a>
					</div>	
					<br/>
					<div>
					<a href="registration.php">Register for Courses</a><br>
					 <a href="history.php">Course History</a>
					</div>
				</div>
				<?php endif ?>
			</div>

		</div>
	</div>
	</section>

	<!-- this us the down side of the page -->
 <footer style="background-color: lightblue">
    <section class="bf">
      <div class="container">
        <hr class="df">
        <div class="row">
          <div class="col-md-5">
          </div>
          <div class="col-md-2">
            <a id="on-top" href="" style="font-size: 20px" class="pull-right go">GO ABOVE
              <span class="bub">
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </footer>


</body>

</html>