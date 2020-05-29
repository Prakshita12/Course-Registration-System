<?php 
	session_start();
$db = mysqli_connect('localhost', 'root', 'root', 'course_register');

	$username = "";
	$email    = "";
	$errors   = array(); 

//this is the login main page will be used to register the useer  
	if (isset($_POST['gr'])) {
		grt();
	}

	//click on the register button
	if (isset($_POST['bn'])) {
		jt();
	}
 
 //if logout button is pressed then login page is again we want to 
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}
//this will see if the username and password empty and it will update the data
	function grt(){
		global $db, $errors;

		
	
		$username    =  e($_POST['user']);
		$email       =  e($_POST['email']);
		$p1  =  e($_POST['pass1']);
		$p2  =  e($_POST['pass2']);
		$sid  =  e($_POST['ssid']);
		$imagename  =  e($_POST['imagename']);

if (empty($username)) { 
			array_push($errors, "Needed username"); 
		}
		if ($sid == "None") { 
			array_push($errors, "Needed sid"); 
		}
		if (empty($email)) { 
			array_push($errors, "Needed email"); 
		}
		if (empty($p1)) { 
			array_push($errors, "Needed password"); 
		}
		if ($p1 != $p2) {
			array_push($errors, "Passwords are different");
		}

		$y=[];
		$query = "SELECT Student_ID from login1 where Student_ID='$sid'";
		$result = mysqli_query($db,$query);
	
//if the SID is taken it will print this result
		if(mysqli_num_rows($result) > 0)
		{
			array_push($errors, "This Student_ID is taken");
		
		
		
		}
		 //this will hash the password and also enter details into tje table
		if (count($errors) == 0) {
			$password = md5($p1);

			if (isset($_POST['type_u'])) {
				$type_u = e($_POST['type_u']);
				$query = "INSERT INTO login1 (username, email, type_u, password, Student_ID, imagename) 
						  VALUES('$username', '$email', '$type_u', '$password', '$sid', '$imagename')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "USER IS CREATED";
				header('location: home.php');
			}else{
				
					$query = "INSERT INTO login1(username, email, type_u, password, Student_ID) VALUES('$username', '$email', 'user', '$password', '$sid')";
					mysqli_query($db, $query);
				//	echo $query;
		  
					
					$_SESSION['user'] = d($username); 
					$_SESSION['success']  = "LOGGED IN";
					header('location: goto.php');			
			}

		}
		else{


		}
		

	}

//get teh data from the login table
	function d($username){
		global $db;
		$query = "SELECT * FROM login1 WHERE username='$username'";
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

//get the value sform the form and submit it
	function jt(){
		global $db, $username, $errors;

		$user = e($_POST['user']);
		$pass = e($_POST['pass']);

		
		if (empty($user)) {
			array_push($errors, "Needed Username");
		}
		if (empty($pass)) {
			array_push($errors, "Needed password");
		}

		
		if (count($errors) == 0) {
			$pwd = md5($pass);

			$query = "SELECT * FROM login1 WHERE username='$user' AND password='$pwd' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { 
				
				$r = mysqli_fetch_assoc($results);
				if ($r['type_u'] == 'admin') {

					$_SESSION['user'] = $r;
					$_SESSION['success']  = "You are now logged in";
					header('location: home.php');		  
				}else{
					$_SESSION['user'] = $r;
					$_SESSION['success']  = "You are now logged in";

					header('location: goto.php');
				}
			}else {
				array_push($errors, "Password and Username different");
			}
		}
	}

	function ln()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}
	//check if the user is admin

	function a()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['type_u'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function ey() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>