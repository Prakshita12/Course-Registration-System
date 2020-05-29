
<?php 
include('important.php');
?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>	
	<link rel="stylesheet" href="css/main.css">
	<script>
	$(document).ready(function(){

// data is taken from the login table and it is checked through that table
		
	                       	$.ajax({
                                    async: false,
                                    type: "GET",
                                    url: "control_data.php",
                                    data: { snow: "login1"},
                                    dataType: "json",
                                    success: function (sd) {
                                       //data is checked through through student id 
                                        for (var i in sd) {
                                            var rt = sd[i];
                                            var dc = rt['Student_ID'];
                                            $("#ssid").append('<option>' + dc + '</option>');

                                        }
                                       


                                    }

                                });

			$("#user").val('');
			$("#pass").val('');
			$("#pass2").val(''); //user values are checked w\like username,password and email
			$("#email").val('');

			$("#user").after('<span id="user1"></span>');
			$("#pass").after('<span id="pass1"></span>');
			$("#pass2").after('<span id="pass21"></span>');
			$("#email").after('<span id="email1"></span>');

			$("#user1").hide();
			$("#pass1").hide();
			$("#pass2").hide();
			$("#email1").hide();

			
			//username should contain alphanumeric characters 
			
		$("#user").focus(function () {
		$("#user1").html("Username should have alphanumeric characters");
		$("#user1").removeClass("Fine");
		$("#user1").removeClass("Err");
		$("#user1").addClass("Know");
		$("#user1").show();
	});

	$("#pass").focus(function () {
		$("#pass1").html("Password should have 8 atleast characters");
		$("#pass1").removeClass("Fine");
		$("#pass1").removeClass("Err");
		$("#pass1").addClass("Know");
		$("#pass1").show();
	});
 //passwords should be same 
	$("#pass2").focus(function () {
		$("#pass21").html("Both passwords should be same");
		$("#pass21").removeClass("Fine");
		$("#pass21").removeClass("Err");
		$("#pass21").addClass("Know");
		$("#pass21").show();
	});

	$("#email").focus(function () {
		$("#email1").html(" Email should be correct");
		$("#email1").removeClass("Fine");
		$("#email1").removeClass("Err");
		$("#email1").addClass("Know");
		$("#email1").show();
	});

			//username should be registered when values are enetered
			
			$("#user").blur(function () {
			var xr = /^[a-zA-Z0-9]+$/;
			var nu = $("#username").val();
			if (nu == '') {
				$("#user1").hide();
			}
			else {
				if (xr.test(nu)) {
					$("#user1").removeClass("Err");
					$("#user1").removeClass("Know");
					$("#user1").addClass("Fine");
					$("#user1").html("Correct");
				}
				else {
					$("#user1").removeClass("Fine");
					$("#user1").removeClass("Know");
					$("#user1").addClass("Err");
					$("#user1").html("Username is incorrect");
				}
			}
		});

//password length shpuld be greater than 8
		$("#pass").blur(function () {
		var dp= $("#pass").val();
		if (dp == '') {
			$("#pass1").hide();
		}
		else {
			if (dp.length >= 8) {
				$("#pass1").removeClass("Err");
				$("#pass1").removeClass("Know");
				$("#pass1").addClass("Fine");
				$("#pass1").html("Correct");
			}
			else {
				$("#pass1").removeClass("Fine");
				$("#pass1").removeClass("Know");
				$("#pass1").addClass("Err");
				$("#pass1").html("Password is incorrect");
			}
		}
	});

$("#pass2").blur(function () {
		var w1= $("#pass").val();
		var w2 = $("#pass2").val();
		if (w2 == '') {
			$("#pass1").hide();
		}
		else {
			if (w1==w2) {
				$("#pass21").removeClass("Err");
				$("#pass21").removeClass("Know");
				$("#pass21").addClass("Fine");
				$("#pass21").html("Correct");
			}
			else {
				$("#pass21").removeClass("Fine");
				$("#pass21").removeClass("Know");
				$("#pass21").addClass("Err");
				$("#pass21").html("Passwords are different");
			}
		}
	});
	$("#email").blur(function () {
		var rg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var m = $("#email").val();
		if (m == '') {
			$("#email1").hide();
		}
		else {
			if (rg.test(m)) {
				$("#email1").removeClass("Err");
				$("#email1").removeClass("Know");
				$("#email1").addClass("Fine");
				$("#email1").html("Correct");
			}
			else {
				$("#email1").removeClass("Fine");
				$("#email1").removeClass("Know");
				$("#email1").addClass("Err");
				$("#email1").html("Email is  incorrect");
			}
		}
	});

			
			

	

	});
	</script>
	<style>
		.Fine, .Know, .Err {
	padding: 0px 2px;
}

.Fine {
	background: lightblue;
	border: 1px;
}

.Know {
	background: lightblue;
	border: 1px;
}

.Err{
	background: lightblue;
	border: 1px;
}
		</style>
</head>
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
          <span class="heading" style="text-decoration-color: orange">REGISTER USER</span>
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
  <section id="home" class="section jumbotron-fluid bg--position-center no-repeat bg-cover md-display-table ">
	<div class="container" >
	<form class="form-group" method="post" action="make.php">

			<?php echo ey(); ?>


		<div>
			<label style="font-style: italic">Username</label>
			<input class="form-control" type="text" id="user" name="user">
		</div>
		<div>
			<label style="font-style: italic">Email</label>
			<input class="form-control" type="email" id="email" name="email" >

		</div>
		<div>
			<label style="font-style: italic">Password</label>
			<input class="form-control" type="password" id="pass" name="pass1">
		</div>
		
		<div>
			<label style="font-style: italic">Confirm password</label>
			<input class="form-control" type="password" id="password2" name="pass2">
		</div>
		<div>
		<label style="font-style: italic">Student ID</label>
		<select class="form-control" id="ssid" name="ssid">
		<option selected>N/A</option>
		</select>

		</div>
		<br/>
		<div>
			<button type="submit" class="btn btn-dark" id="submit" name="gr" style="border-radius:12px" style="font-weight: 30%" style="background-color: black">REGISTRATION</button>
		</div>
		<p>
			Signed In Already? <a href="login.php">SIGN IN</a>
		</p>
	</form>

	</div>
</section>

 <footer style="background-color: lightblue">
    <section class="bf">
      <div class="container">
        <hr class="df">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-2">
            <a id="on-top" style="font-size: 20px" href="" class="pull-right go">GO ABOVE
              <span class="bub">
                <i class="ion-ios-arrow-thin-up"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </footer>

	
</body>
</html>