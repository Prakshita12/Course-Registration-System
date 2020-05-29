<?php 
session_start();

	$username = "admin";
	$password = "admin";
	
	//it's for the amdin page and for getting the table details
	$tn = $_GET['snow'];

	
	$conn = mysqli_connect('localhost', 'root', 'root', 'course_register');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	


	$y = [];
	
	
	
	
	$result = mysqli_query($conn,"SELECT * FROM $tn where Deleted ='N'");
	
	while(	$a = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$y[] = $a;
	}
	
	mysqli_close($conn);
	if($y)
	{
		echo json_encode($y);
		
	
	}

	
	
	
	
	
	
	
	
?>