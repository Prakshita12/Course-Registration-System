<?php 
session_start();

	$username = "admin";
	$password = "admin";
	//get the selected table and display in the table
	
	$tn = $_GET['snow'];
	$chosenColumn = $_GET['cc'];
	
//databsase is connected
	
	$conn = mysqli_connect('localhost', 'root', 'root', 'course_register');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
//this is the array we will be needing

	$y = [];
	
	//select the data from the teacher's table
	
	if($tn == "coll_data1" || $tn == "instr_pno1")
	{
	$result = mysqli_query($conn,"SELECT instr_ID from instr1");
	}
	//select from the college number table
	else if($tn== "coll_pno1")
	{
		$result = mysqli_query($conn,"SELECT Coll_name from coll_data1");
	}
	//select from the subject table
	else if($tn == "subject1" || $tn == "d_pno1" || $tn == "instr1" || $tn == "student1")
	{
		$result = mysqli_query($conn,"SELECT dept_code from dept1");
	}
	//get from the department table
	else if($tn == "dept1")
	{
		$q  = "SELECT Coll_name from coll_data1;";
		$q1 = "SELECT instr_ID from instr1;";
		$result = mysqli_query($conn,$q);
		$result1 = mysqli_query($conn,$q1);
		
	
	}
	//get from the section table
	else if($tn == "sec1")
	{
		$q  = "SELECT subject_ID from subject1;";
		$q1 = "SELECT instr_ID from instr1;";
		$result = mysqli_query($conn,$q);
		$result1 = mysqli_query($conn,$q1);
		
	
	}
	//get from the student and the login table
	else if($tn == "stu_pno1" || $tn == "login1")
	{
		$result = mysqli_query($conn,"SELECT Student_ID from student1");
	}
	//get the data for the cart and lend table
	else if($tn == "lend1" || $tn == "data_cart")
	{
		$q  = "SELECT SecId from sec1;";
		$q1 = "SELECT Student_ID from student1;";
		$result = mysqli_query($conn,$q);
		$result1 = mysqli_query($conn,$q1);
		
	
	}
	 
	//get various tables for the admin as well as users
	while(	$a = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$y[] = $a;
	}
	if($tn == "dept1" || $tn == "sec1" || $tn == "lend1" || $tn == "data_cart")
	{
	while(	$a = mysqli_fetch_array($result1, MYSQLI_ASSOC))
	{
		$y[] = $a;
	}
	}
	//get the data in the form of array
	mysqli_close($conn);
	
	if($y)
	{
		echo json_encode($y);
		
	
	}


	
?>