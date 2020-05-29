<?php


session_start();
// This is used to start the session 
// This is used to connect to the database

$con = mysqli_connect('localhost', 'root', 'root', 'course_register');
// if not connected to the database the database will show an error an will die
	if (!$con) 
	{

    die("Connection failed: " . mysqli_connect_error());

	}
//we will get the name of the table we want to get the data
$tablename = $_POST['tablename'];
//the array of the table will be posted
$array = $_POST;
//we shift the array
$r1 = array_shift($array);

$res = array();
// implode the data with the table and add entries
foreach ($array as $key => $v) 
{
  $data= implode(", ",array_keys($array));
	
	
$v = "'".$v."'";
// implode the data with the table and add entries

array_push($res, $v); 


}
$res  = implode(",", $res);

//insert the data into the table by entering the details

$sql = "INSERT INTO `$tablename` ($data) VALUES ($res)";


	
	if (mysqli_query($con, $sql)) 
	{ 

		// New record is created
	echo "Record created";
	// get the table name
	$_SESSION['coltod'] = $tablename;
	// go to this page
	header("Location: admin_data.php");
	die();	
	} 
	else 
	{
		// otherwise there is an error

    echo "Error: " . $sql . "<br>" . mysqli_error($con);

	}
	mysqli_close($con);



?>