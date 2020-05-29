<?php 
session_start();

	$username = "admin";
	$password = "admin";
	//get the table details
	
    $et = $_GET['snow'];
    $look = $_GET['look'];
    $wind = $_GET['wind'];

    if($_GET['wind1'])
    {
        $look1 = $_GET['look1'];
        $wind1 = $_GET['wind1'];
    }

	
    
//database connection
	$conn = mysqli_connect('localhost', 'root', 'root', 'course_register');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
    //select query will update the data in  the admin tabLE
    if($wind1)
    {
        $result = mysqli_query($conn,"SELECT * FROM $et where $wind = '$look' && $wind1 = '$look1'");
    }
    else{
        $result = mysqli_query($conn,"SELECT * FROM $et where $wind = '$look'");
    }
   //put the data in the json array
	
	$o = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	
	mysqli_close($conn);
	if($o)
	{
	$json = json_encode($o);
    
    echo $json;
	}

	
	
	
	
	
	
	
	
?>