<?php


session_start();

$conn = mysqli_connect('localhost', 'root', 'root', 'course_register');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	//get the table details from otrher page
	
$tr = $_GET['snow'];
$look = $_GET['look'];
$wind = $_GET['wind'];
//when  table to be deleted in brought
if($_GET['wind1'])
{
    $look1 = $_GET['look1'];
    $wind1 = $_GET['wind1'];

}


//update the table or cart you want to delete in cart as well as tables for admin
if($wind1)
{
	$sql = "UPDATE $tr SET Deleted='Y' where $wind = '$look' && $wind1 = '$look1'";
	
}
else{
    $sql = "UPDATE $tr SET Deleted='Y' where $wind = '$look'";
}

	//the message will be displayed that the record is deleted
	if (mysqli_query($conn, $sql)) 
	{
	echo "Record is deleted";;
	} 
	else 
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);



?>