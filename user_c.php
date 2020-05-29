<?php 
include('important.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/validate.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<script>
	$(document).ready(function(){
//this will get the dropdown data from teh login table and them create the user
		
	                       	$.ajax({
                                    async: false,
                                    type: "GET",
                                    url: "control_data.php",
                                    data: {
                                     snow: "login1"  //login table is selected
                                 },
                                    dataType: "json",
                                    success: function (sd) {
                                       
                                        for (var i in sd) {
                                            var rt = sd[i];
                                            var dc = rt['Student_ID'];
                                            $("#ssid").append('<option>' + dc + '</option>');

                                        }
                                       


                                    }

                                });

			$("#user").val(''); //these are the various fields to check the username and password and password2 and email details
			$("#pass").val('');
			$("#pass2").val('');
			$("#email").val('');

			$("#user").after('<span id="user1"></span>');      //data is inserted after username
			$("#pass").after('<span id="pass1"></span>');     //data is inserted after password
			$("#pass2").after('<span id="pass21"></span>');    //data is inserted after password2
			$("#email").after('<span id="email1"></span>');    //data is inserted after email

			$("#user1").hide();
			$("#pass1").hide();
			$("#pass2").hide();
			$("#email1").hide();

			
			
			
		$("#user").focus(function () { //the username should contain the alphanumeric characters
		$("#user1").html("Username should have alphanumeric characters");
		$("#user1").removeClass("Fine"); //remove the class fine
		$("#user1").removeClass("Err");//remove the class error
		$("#user1").addClass("Know"); //add the class know
		$("#user1").show();
	});

	$("#pass").focus(function () {
		$("#pass1").html("Password should not be less than 8 characters");
		$("#pass1").removeClass("Fine");  //password should contain more than 8 characters
		$("#pass1").removeClass("Err");//find class is removed
		$("#pass1").addClass("Know");//error class is removed
		$("#pass1").show();//show whatever is to be shown
	});

	$("#pass2").focus(function () {
		$("#pass21").html("Both passwords should be same");//the passowrds should be same
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

			
			
			$("#user").blur(function () {
			var xr = /^[a-zA-Z0-9]+$/;
			var nu = $("#user").val();
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


$("#type_u").blur(function () {
			var tu = $("#type_u").val();
			if (tu == "None") {
			
					$("#type_u1").removeClass("Fine");
					$("#type_u1").removeClass("Know");
					$("#type_u1").addClass("Err");
					$("#type_u1").html("Choose the type");
			}
			else {
				
	
					$("#type_u1").removeClass("error");
					$("#type_u1").removeClass("info");
					$("#type_u1").addClass("ok");
					$("#type_u1").html("OK");
				
			}
		});

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
	<!-- css for the form -->
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
          <span class="heading" style="text-decoration-color: orange">USER CREATION</span>
        </a>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="welcome.html" style="font-size:20px" style="font-style: italic">HOME
              <span class="sr-only"></span>
            </a>
          </li>
          <li>
            <a href="about.html" style="font-size:20px" style="font-style: italic">ABOUT</a>
          </li>
          <li>
            <a href="make.php" style="font-size:20px"  style="font-style: italic">REGISTER</a>
          </li>
          
          <li>
            <a href="login.php" style="font-size:20px" style="font-style: italic">LOGIN</a>
          </li>
        </ul>
      </div>
   
    </div>
  </nav>
  <section id="home" class="section jumbotron-fluid bg--position-center no-repeat bg-cover md-display-table ">
	<div class="container">
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
			<label>User type</label>
			<select class="form-control"  style="font-style: italic" name="type_u" id="type_u" >
				<option value="None">N/A</option>
				<option value="admin">ADMIN</option>
				<option value="user">USER</option>
			</select>
		</div>
		<div>
		<label style="font-style: italic">Student ID</label>
		<select class="form-control" id="ssid" name="ssid">
		<option selected>None</option>
		</select>

		</div>
		
		<div >
			<label>Image Name</label>
			<input class="form-control" type="text" name="imagename" id="imagename" >
		</div>
		<br/>
		<div>
			<button type="submit" class="btn btn-dark" style="font-size: 15px" style="font-style: italic;" name="gr" style="background-color: lightblue"> Create user</button>
		</div>
	</form>
	</div>
</section>
 <footer style="background-color: lightblue">
    <section class="bf">
      <div class="container">
        <hr class="df">
        <div class="row">
          <div class="col-md-5">
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