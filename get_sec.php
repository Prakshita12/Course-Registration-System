<?php
    $core = $_REQUEST['core']; 
    // it connects to the database
    $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
    //this query will select the data form the courses where subject no is there
    $query = "SELECT DISTINCT sec_no FROM sec1 WHERE subject_ID
                IN (SELECT subject_ID FROM subject1 WHERE subject1.subject_Info ='" . $core . "')";
    $result = mysqli_query($con, $query);
//data is the form of array
    $reject = array();
    $reject[0] = '<option value = ""></option>';
    $num = 1;
    //data in the form of table
    while($show = mysqli_fetch_assoc($result)){
        $reject[$num] = "<option value ='" . $show['sec_no'] . "'>" . $show['sec_no'] . "</option>";
        $num++;
    }
    //json encode the array
    echo json_encode($reject);

    mysqli_close($con);
?>