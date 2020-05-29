<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <link href="css/ionicons.min.css" rel="stylesheet">
  <link href="css/linear-icon.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <link href="css/owl.theme.css" rel="stylesheet">   
      <script src="js/jquery-3.1.0.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/main.js"></script></body>
  <link rel="stylesheet" href="css/main.css">
 
 
    <script>
        $(document).ready(function()
          { //this is the cart page which when student who registered can enter the data
            var sid_u = <?php echo $_SESSION['user']['Student_ID'];?>;
            $.ajax({

                async: false, //get the cart entries 
                url: 'g_C_E.php',
                type: 'POST', // data will be the student ID
                data: {sid_u: sid_u},
                dataType: 'json',
                //if success data will be seen
                success: function(response) 
                {
                    $('#show').empty();
                    for (var j in response){
                        $('#show').append(response[j]);
                    }
                }

            });
            //when the remove button is clicked it goes to anotheer page and the entry is deleted and when can enter another data
            $(document).on("click", ".remove", function(e){
                var look = $(this).attr('id');
                var wind = 'SecId'; //get the section id
                var look1 = sid_u; //get the user id
                var wind1 = 'Student_ID'; //get the section id
                var snow = 'data_cart'; //this is the table data
                  $.ajax({
                    async: false,
                    url: 'data_del.php',
                    type: 'GET', // get the data from the table
                    data: {
                      look: look,
                       wind:wind, 
                       look1:look1,
                        wind1:wind1,
                         snow:snow
                       },
                    dataType: 'text',
                    success: function(response) {
                        alert(response);
                        location.reload();
                     
                    }

                });
            });
            //this function will be done as soon as uh click the register button
            $(document).on("click", "#register", function(e){
               var num = $('#show tr').length - 1; 
               // we cannot register if we haven't put any subjects in the cart
               if(num <= 0 || num > 3)
               {
                    alert("User can register for not more than 3 classes");

               } 
               else 
               { 
                //table will be formed when the subject is selected
                    var fool = [];
                    $(".remove").each(function()
                    {

                       fool.push($(this).attr('id'));
                    });
                   $.ajax({
                        type: 'POST',
                        data: { //this is will do the enrollment by clicking the button
                          sid_u: sid_u, 
                          fool: fool

                        },
                        url: 'get_register.php',
                        success: function(response) {
                            alert(response);
                        }
                   });
               }
               
            })
        });
    </script>
    <style>
         table {
            border-collapse: 3px;
            border-color: lightblue;
            width: 100%;
            font-style: italic;
            border-color: black;
        }
      table,
        td,
        th {
            border: 3px solid #ddd;
            text-align: left;
            font-style: italic;
            border-color: lightblue;
            color:blue;
        }
     
         tr:hover {
            background-color: lightblue;
            color: black;
        }
        td:hover {
            background-color: #ddda2393;
            color: black;
        }
        th,
        td {
            padding: 15px;

        }
       
        .crow {
            text-align: center;
            
        }
        .crow a{
            text-decoration: none;
          
        }
        .form-inline .form-group {
  margin-right:8px;
}
.btn:hover {
  font: 20px sans-serif;
  text-decoration: none;
   font-style:italic;
  background-color:green;
  color: white;
  padding: 2px 14px 2px 14px;
border-top: 1px solid lightgreen;
  border-right: 1px solid lightgreen;
  border-bottom: 1px solid lightgreen;
  border-left: 1px solid lightgreen;
}

.btn {
  font: 20px sans-serif;
  text-decoration: none;
   font-style:italic;
  background-color:black;
  color: white;
  padding: 2px 14px 2px 14px;
  border-top: 1px solid lightgreen;
  border-right: 1px solid lightgreen;
  border-bottom: 1px solid lightgreen;
  border-left: 1px solid lightgreen;
}

   </style>
</head>

<body>
   <!-- This is the navigation bar where you can find and navigate to various pages -->
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: lightblue">
    <div class="container">
      <div class="navbar-header">
         <!-- This is the navigation bar header and we are having various links -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="images/o.jpg">
           <!-- Picture at the left of the navbar -->
          <span class="heading" style="text-decoration-color: orange">COURSE REGISTRATION</span>
        </a>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="welcome.html" style="font-size:20px">HOME
              <span class="sr-only"></span>
            </a>
          </li>
          <li>
            <a href="about.html" style="font-size:20px">ABOUT</a>
          </li>
          <li>
            <a href="make.php" style="font-size:20px">REGISTER</a>
          </li>
          
          <li>
            <a href="login.php" style="font-size:20px">LOGIN</a>
          </li>
           
        </ul>
      </div>
   
    </div>
  </nav>

  <section id="home" class="section jumbotron-section bg--position-center no-repeat bg-cover md-display-table" >
  <div>
     <table id='show'>
    </table>
    <br/>
    <div>
    <button class="btn btn-primary" id='register'>REGISTER</button>
    </div>
    <br/>
    <div>
    <a class="btn btn-primary" href='registration.php'>BACK TO FIND</a>
    </div>
    </div>
  </section>

<footer style="background-color: lightblue">
    <section class="bf">
      <div class="container">
        <hr class="df">
        <div class="row">
          <div class="col-md-5">
          </div>
          <div class="col-md-2">
            <a id="on-top" style="font-size: 20px" href="" class="pull-right go">GO ABOVE
              <span class="bub">
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </footer>


</html>