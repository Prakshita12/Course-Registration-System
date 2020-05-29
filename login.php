<?php 
include('important.php');
 ?>
<!DOCTYPE html> 
<html>
<head>
	<!-- This is the login page and user can login through this page -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/validate.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/main.css">

	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	<script>
	$(document).ready(function(){

		$("#user").val('');
		$("#pass").val('');
		
		$("#user").after('<span id="user1"></span>');
		$("#pass").after('<span id="pass1"></span>');

		$("#user1").hide();
		$("#pass1").hide();

		

		
	$("#user").blur(function () {
			
			var nu = $("#user").val();
			if (nu == '') {
			$("#user1").show();	
			$("#user1").addClass("Err");
			$("#user1").html("Need username");
			}
			else{
				$("#user1").hide();
			}
			
			
		});


		$("#pass").blur(function () {
		var pwd = $("#pass").val();
		if (pwd == '') {
			$("#pass1").show();
			$("#pass1").addClass("Err");
			$("#pass1").html("Needed password");
		}
		else{
			$("#pass1").hide();
		}
		
	});


	});
	</script>
	<style>
	 .Err{
	padding: 0px 2px;
background-color: lightblue;
	border: 2px solid #c99;
	}



	</style>
</head>
<body>
<body>
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
          <span class="heading" style="text-decoration-color: orange">USER LOGIN</span>
        </a>
      </div>


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

<section id="home" class="section jumbotron-fluid bg--position-center no-repeat bg-cover md-display-table" >
<div class="container">
	<form class="form-group" method="post" action="login.php">

		<?php echo ey(); ?>

		<div>
			<label>USERNAME</label>
			<input class="form-control" type="text" id="user" name="user" >
		</div>
		<div>
			<label>PASSWORD</label>
			<input class="form-control" type="password" id="pass" name="pass">
		</div>
		<br/>
		<div>
			<button class="btn btn-dark" type="submit" id="submit" class="btn" name="bn" style="border-radius:12px" style="font-weight: 30%" style="background-color: black">LOGIN</button>
		</div>
		<p>
			Not a Member? <a href="make.php">SIGN UP</a>
		</p>
	</form>
</div>
</section>
 

</body>
</html>