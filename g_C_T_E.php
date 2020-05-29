<?php
    session_start();
    
    $core = $_POST['core'];
    $wd = $_POST['wd'];
    $school = $_REQUEST['school'];
    $tool = $_REQUEST['tool'];
    $find = $_POST['find'];

   //this page will get the data in the when text is typed or when school drpartment or course or section is selected from the dropdown

    $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
//when the data is typed 
    if(isset($find))
    {
        $query = "SELECT dept1.dept_name, subject1.Level, subject1.subject_Info, sec1.TD, sec1.sec_no FROM dept1 INNER JOIN subject1 ON dept1.dept_code = subject1.subject_De_Info INNER JOIN sec1 ON subject1.subject_ID = sec1.subject_ID WHERE sec1.ONC= 'Y' AND sec1.Deleted = 'N' AND (dept1.Coll_name ='$find' || dept1.dept_name='$find'  || subject1.subject_Info= '$find'  || subject1.Level= '$find') ";
        
        $result = mysqli_query($con, $query);
        $reject= array();
        $reject[] = "<tr><th>Department</th><th>Subject Number</th><th>Subject Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($show = mysqli_fetch_array($result, MYSQLI_NUM)){
           
            $reject[] = "<tr><td>" . $show[0] . "</td><td>" . $show[1] . "</td><td>" . $show[2] . "</td><td>" . $show[3] . "</td><td>" . $show[4] . "</td><td><button class='add btn btn-primary'>Add</button></td></tr>";
        }
        
    }
    // when school is searched this wuery will be performed
    if (isset($school) and !isset($wd) and !isset($core) and !isset($tool)){
        $query = "SELECT dept1.dept_name, subject1.Level, subject1.subject_Info, sec1.TD, sec1.sec_no, sec1.SecId FROM dept1 INNER JOIN subject1 ON dept1.dept_code = subject1.subject_De_Info INNER JOIN sec1 ON subject1.subject_ID = sec1.subject_ID WHERE  sec1.ONC = 'Y' AND sec1.Deleted = 'N' AND dept1.Coll_name ='$school'";
        
        $result = mysqli_query($con, $query);
        $reject = array();
        $reject[] = "<tr><th>Department</th><th>Subject Number</th><th>Subject Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($show = mysqli_fetch_array($result, MYSQLI_NUM)){
            $reject[] = "<tr><td>" . $show[0] . "</td><td>" . $show[1] . "</td><td>" . $show[2] . "</td><td>" . $show[3] . "</td><td>" . $show[4] . "</td><td><button class='add btn btn-primary' id ='". $show[5] ."'>Add</button></td></tr>";
        }
    } 
    // hwne school and department is searched
    elseif (isset($school) and isset($wd) and !isset($core) and !isset($tool)) {
        $query = "SELECT dept1.dept_name, subject1.Level, subject1.subject_Info, sec1.TD, sec1.sec_no,sec1.SecId FROM dept1 INNER JOIN subject1 ON dept1.dept_code = subject1.subject_De_Info INNER JOIN sec1 ON subject1.subject_ID = sec1.subject_ID WHERE  sec1.ONC = 'Y' AND sec1.Deleted = 'N' AND dept1.Coll_name ='$school' AND dept1.dept_name='$wd'";
        
        $result = mysqli_query($con, $query);
        $reject = array();
        $reject[] = "<tr><th>Department</th><th>Subject Number</th><th>Subject Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($show = mysqli_fetch_array($result, MYSQLI_NUM)){
            $reject[] = "<tr><td>" . $show[0] . "</td><td>" . $show[1] . "</td><td>" . $show[2] . "</td><td>" . $show[3] . "</td><td>" . $show[4] . "</td><td><button class='add btn btn-primary'  id ='". $show[5] ."'>Add</button></td></tr>";
        }
    } 
    // when school,department and course is searched
    elseif (isset($school) and isset($wd) and isset($core) and !isset($tool)) {
        $query = "SELECT dept1.dept_name, subject1.Level, subject1.subject_Info, sec1.TD, sec1.sec_no, sec1.SecId FROM dept1 INNER JOIN subject1  ON dept1.dept_code = subject1.subject_De_Info INNER JOIN sec1 ON subject1.subject_ID = sec1.subject_ID WHERE   sec1.ONC = 'Y' AND sec1.Deleted = 'N' AND dept1.Coll_name ='$school' AND dept1.dept_name='$wd' AND subject1.subject_Info= '$core'";
        
        $result = mysqli_query($con, $query);
        $reject = array();
        $reject[] = "<tr><th>Department</th><th>Subject Number</th><th>Subject Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($show = mysqli_fetch_array($result, MYSQLI_NUM)){
            $reject[] = "<tr><td>" . $show[0] . "</td><td>" . $show[1] . "</td><td>" . $show[2] . "</td><td>" . $show[3] . "</td><td>" . $show[4] . "</td><td><button class='add btn btn-primary' id ='". $show[5] ."'>Add</button></td></tr>";
        }
    }
     // when school,department and course and section is searched
    elseif (isset($school) and isset($wd) and isset($core) and isset($tool)) {
        $query = "SELECT dept1.dept_name, subject1.Level, subject1.subject_Info, sec1.TD, sec1.sec_no,sec1.SecId FROM dept1 INNER JOIN subject1 ON dept1.dept_code = subject1.subject_De_Info INNER JOIN sec1 ON subject1.subject_ID = sec1.subject_ID WHERE  sec1.ONC = 'Y' AND sec1.Deleted = 'N' AND dept1.Coll_name ='$school' AND dept1.dept_name='$wd' AND subject1.subject_Info= '$core' AND sec1.sec_no ='$tool'";
        
        $result = mysqli_query($con, $query);
        $reject = array();
        $reject[] = "<tr><th>Department</th><th>Subject Number</th><th>Subject Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($show = mysqli_fetch_array($result, MYSQLI_NUM)){
            $reject[] = "<tr><td>" . $show[0] . "</td><td>" . $show[1] . "</td><td>" . $show[2] . "</td><td>" . $show[3] . "</td><td>" . $show[4] . "</td><td><button class='add btn btn-primary'  id ='". $show[5] ."'>Add</button></td></tr>";
        }
    }


    echo json_encode($reject);
 
    mysqli_close($con);
        
?>