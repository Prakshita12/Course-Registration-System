<?php 
	include('important.php');

	if (!a()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

?>
<!-- This is the page for admin as soon as the admin clicks on this page it will show varipus thinsg -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/magnific-popup.css">
	
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

 <nav class="navbar navbar-default navbar-fixed-top" style="background-color: lightblue">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse">
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


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="welcome.html" style="font-size:20px">HOME
              <span class="sr-only">(current)</span>
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
	<h2>WELCOME ADMIN</h2>

	</div>
 
  <section id="home" >
  
	<div class="container">
	
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<br/>
		<!-- user will be entered on this page -->
		<!-- This is the admin page and varuious options are mentioned on this page and you can enter data  -->
		<img height="100" width="100" src="images/user2.png"  >
		
			<div>
				<!-- User will be welcomed and admin can create a uswer  -->
				<?php  if (isset($_SESSION['user'])) : ?>
					<i><?php echo $_SESSION['user']['username']; ?></i>

					<div>
						<!-- He can create the table as well as the user he wants -->
						<i  style="color: black;">
							(<?php echo ucfirst($_SESSION['user']['type_u']); ?>)
						</i> 
					</div>
						<br/>
					<div>
							<a href="home.php?logout='1'" style="color:green;">LOGOUT</a>
							<br>
							<br>

					
				 <a href="user_c.php"> Create a user</a><br>
			
					<a href="history.php">Courses Enrolled</a><br>
					<a href="registration.php">Register Course</a><br>
					<a href="admin_data.php">Update data for Admin</a>
          			</div>
					
				<?php endif ?>
			</div>
		</div>


</div>
</section>



	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/main.js"></script>
			
</body>
</html>