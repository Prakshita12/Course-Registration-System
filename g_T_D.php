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
	
	
	
	//this will get all the tables from the database
	$result = mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'course_register' AND TABLE_NAME = '$tn';");
	
	while(	$userData = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		$y[] = $userData;
	}
	//data in the form of table
	mysqli_close($conn);
	if($y)
	{
		echo json_encode($y);
		
	
	}

	
	
	
	
	
	
	
	
?>