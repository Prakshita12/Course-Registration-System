<?php
// this page will add the data to the cart
    session_start();
   // connect to the database
    $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
 //get the user data from the cart page
   $sti = $_REQUEST['sti'];
   $sid_u = $_REQUEST['sid_u'];

   //insert the data into the cart by writing the query

 
        $sql = "INSERT INTO data_cart (SecId, Student_ID, Deleted) VALUES ('$sti', '$sid_u', 'N' )";
        //if query is successful data is inserted into the cart
        if(mysqli_query($con, $sql))
        {
            
            echo "Subject is inserted";

        } 
        //otherwise we'll see if the data is still in the cart using the student ID

        elseif(mysqli_num_rows(mysqli_query($con, "SELECT * FROM data_cart WHERE SecId='$sti' AND Student_ID='$sid_u' AND data_cart.Deleted = 'Y'")) > 0)
         {
          //update the data in the cart if the subject was already there
            $sql = "UPDATE data_cart SET Deleted = 'N' WHERE SecId= '$sti' AND Student_ID='$sid_u'";
            mysqli_query($con, $sql);
            //echo if the subject is again inserted
            echo "Subject is again inserted";
        } 

       else
       {
        //otherwise there is an error
            echo $sql . "<br>" . mysqli_error($con);
       }

    mysqli_close($con);
    
?>
