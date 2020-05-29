<?php 
session_start();

	$username = "admin";
	$password = "admin";
	
	$chosenTable = $_GET['snow'];

//this will connect to the database
	
	$conn = mysqli_connect('localhost', 'root', 'root', 'course_register');
	if (!$conn) {
   echo "Connection failed: " . mysqli_connect_error();
	}
	

//this is the database
	$y= [];
	
	
	//this query will get the primary keys from the table 
	$sql = mysqli_query($conn,"SHOW KEYS FROM $chosenTable WHERE Key_name = 'PRIMARY'");
	
	while(	$userData = mysqli_fetch_array($sql, MYSQLI_ASSOC))
	{
		//the data is in the form of table
		$y[] = $userData;
	}
	//data wil be in the form of table
	mysqli_close($conn);
	
	if($y)
	{
		echo json_encode($y);
		
	}
		
	
?>