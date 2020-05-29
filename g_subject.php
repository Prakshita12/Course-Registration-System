<?php
    $wd= $_REQUEST['wd'];  
    // this queery will get the courses through the database
    //so connect the database
    $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
    //this is to get the courses from the subejct table
    $query = "SELECT DISTINCT subject_Info FROM subject1 WHERE subject_De_Info
                IN (SELECT dept_code FROM dept1 WHERE dept1.dept_name ='" . $wd. "')";
    $result = mysqli_query($con, $query);
    // THE DATA IS PUT INTO THE Array
    $data = array();
    $data[0] = '<option value = ""></option>';
    $num = 1;
    //put the data int trhe form of the table
    while($show = mysqli_fetch_assoc($result)){
        $data[$num] = "<option value ='" . $show['subject_Info'] . "'>" . $show['subject_Info'] . "</option>";
        $num++;
    }
    //used json encode to get in the form of json array
    echo json_encode($data);
   
    mysqli_close($con);
?>