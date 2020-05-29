<?php


session_start();
//go the database and this checks the database and update the data

$conn = mysqli_connect('localhost', 'root', 'root', 'course_register');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
	//get the tabledata 
$tn = $_POST['tablename'];
$oye = $_POST['oye'];
//get the tables

if($_POST['oye1'])
{
	$oye1 = $_POST['oye1'];
}


//array is post

$array = $_POST;
$r = array_shift($array);

if($oye1)
{
	$r2 = array_pop($array);
}


$r1 = array_pop($array);
//$chosenTable = ;

$values = array();
foreach ($array as $key => $value) {
  $columns = implode(", ",array_keys($array));
	
	
$value = "'".$value."'";
array_push($values, $value); 


}

//array is declared
$y = [];


//get the table data from the schema and tablename

$result = mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'course_register' AND TABLE_NAME = '$tn';");

while(	$userData = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $y[] = $userData['COLUMN_NAME'];
}

//print_r($data);
$toll = "";
foreach($values as $i => $item)
{
if($toll == "")
{
	$toll = $y[$i]."=".$item;
}
else{

	$toll = $toll.",". $y[$i]."=".$item;
}


}

//update the columns data by clicking on the column

$push = "'".$oye."'";
if($oye1)
{
	$push1 = "'".$oye1."'";
	$sql = "UPDATE $tn SET $toll where $y[0] = $push && $y[1] = $push1";
	
	
}
else{

	
	$sql = "UPDATE $tn SET $toll where $y[0] = $push";
}
//this way data is updated
	
	if (mysqli_query($conn, $sql)) 
	{
	echo "Data is updated";

	$_SESSION['coltod'] = $tn;
	header("Location: admin_data.php");
	die();
	} 
	else 
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);



?>