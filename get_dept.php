<?php
    $school= $_REQUEST['school']; 
    // connected to teh database
    $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
    // this query will get the department data
    $query = "SELECT DISTINCT dept_name FROM dept1 WHERE Coll_name='" . $school . "'";
    $result = mysqli_query($con, $query);
    // data is put into the department array
    $reject = array();
    $reject[0] = '<option value = ""></option>';
    $num = 1;
    while($show = mysqli_fetch_assoc($result))
    {
        //now it is in the form of the table

        $reject[$num] = "<option value ='" . $show['dept_name'] . "'>" . $show['dept_name'] . "</option>";
        $num++;
    }
    echo json_encode($reject);
    mysqli_close($con);
                
?>