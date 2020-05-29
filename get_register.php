<?php
    session_start();

   
    $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
 // the table displayed after entering the details
    $fool = $_REQUEST['fool'];
    $sid_u = $_REQUEST['sid_u'];
    $yet = "true";
    $yet1 = "true";
    

    
    //this will giv the sectionlimit of the secrions
    foreach($fool as $i  => $item){
        
        $sql= "SELECT SectionLimit FROM sec1 WHERE SecId = '$item'";
        $result = mysqli_query($con, $sql);
        $reach= mysqli_fetch_assoc($result)['SectionLimit'];
    //if the sections is full this message will be displayed
    
        if($reach- 1 < 0){
           echo "One or more of the sections is Full";
           $yet1 = "false";
        }
         //the data is taken from the table lend and check the limit of the section and the subject is inserted before if it is greater than 0 then inserted otherwise it will show section is full
        else{

            if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM lend1 WHERE SecId='$item' AND Student_ID='$sid_u' AND lend1.Deleted = 'Y'")) > 0) {
                $sql = "UPDATE lend1 SET Deleted = 'N' WHERE SecId= '$item' AND Student_ID='$sid_u'";
                if(mysqli_query($con, $sql)){
                    $reach = $reach - 1; 
                     //the data is taken from the table lend and check the limit of the section and the subject is inserted before if it is greater than 0 then inserted otherwise it will show section is full
                       $sql = "UPDATE sec1 SET SectionLimit= $reach WHERE SecId='$item'";
                       mysqli_query($con, $sql);
                       $yet = "true";
                       echo "Subject is inserted again";
                }
                
            } 
           else{ 
            //otherwise you are registered and if more than once then else part will be displayed
            $sql= "INSERT INTO lend1 (Student_ID, secti_ID) VALUES ('$sid_u', '$item')";
            if(mysqli_query($con, $sql))
            {
                   $reach = $reach- 1; 
                    $yet = "true";
                   $sql = "UPDATE sec1 SET SectionLimit= $reach WHERE SecId='$item'";
                   mysqli_query($con, $sql);
                   echo " You are registered";
            }
            else{
                $yet= "false";
                echo "Registered for more than one of these courses";
            }
           } 
           
        }
       
    }
    mysqli_close($con);
    
?>
