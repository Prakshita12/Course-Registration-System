<?php
    session_start(); 
    // this page will get the cart details of the data

    $sid_u = $_REQUEST['sid_u'];
    $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
//get the data from the tables using these quries and display them in the form of the table
    
    if(isset($_REQUEST['snow']))
    { 
        //this will get the cart entries for the table and make the table and show the data of thr table by performing various queries
        $tn = $_REQUEST['snow'];

        $query = "SELECT dept1.dept_name, subject1.Level, subject1.subject_Info, sec1.TD, sec1.sec_no, lend1.SecId, lend1.Deleted, lend1.Grade FROM lend1 INNER JOIN sec1 ON lend1.SecId = sec1.SecId INNER JOIN subject1 ON sec1.subject_ID = subject1.subject_ID INNER JOIN dept1 ON subject1.subject_De_Info = dept1.dept_code WHERE lend1.Student_ID = '$sid_u'";
        
    }
    else
    {
        //otherwise this query is 
        $query = "SELECT dept1.dept_name, subject1.Level, subject1.subject_Info, sec1.TD, sec1.sec_no, data_cart.SecId, data_cart.Deleted FROM data_cart INNER JOIN sec1 ON data_cart.SecId = sec1.SecId INNER JOIN subject1 ON sec1.subject_ID = subject1.subject_ID INNER JOIN dept1 ON subject1.subject_De_Info = dept1.dept_code WHERE data_cart.Student_ID = '$sid_u'";
        
            
    }
    //this will make the table for the data entered into the cart

    if($response = mysqli_query($con, $query)){
        $reject = array();
        if($tn)
        {
            $reject[] = "<tr><th>Department</th><th>Subject Number</th><th>Subject Name</th><th>Time</th><th>Section Number</th><th>Grade</th></tr>";
        }
        else{
            $reject[] = "<tr><th>Department</th><th>Subject Number</th><th>Subject Name</th><th>Time</th><th>Section Number</th><th>Remove</th></tr>";
            
        }

        while($show = mysqli_fetch_array($response, MYSQLI_NUM)){
            if ($show[6] == 'N') {
                
                if(!$tn)
                {
                    
                    
                    $reject[] = "<tr><td>" . $show[0] . "</td><td>" . $show[1] . "</td><td>" . $show[2] . "</td><td>" . $show[3] . "</td><td>" . $show[4] . "</td><td><button class='remove btn btn-danger' id ='". $show[5] ."'>Remove</button></td></tr>";
                    
                }
                else{
                    if(!$show[7])
                    {
                        $show[7] = "N/A";
                    }
                    $reject[] = "<tr><td>" . $show[0] . "</td><td>" . $show[1] . "</td><td>" . $show[2] . "</td><td>" . $show[3] . "</td><td>" . $show[4] . "</td><td>" . $show[7] . "</td></tr>";
                    
                }
            } 
        }
        echo json_encode($reject);
    } else {
      

    }
    
    mysqli_close($con);
?>