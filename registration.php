<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link href="css/ionicons.min.css" rel="stylesheet">
  <link href="css/linear-icon.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <link href="css/owl.theme.css" rel="stylesheet">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/main.css">
    <script>
        //this is the page for enrollment 
        //you cna enroll through this page
                $(document).ready(function(){
            $('#show').hide();
// this is used to enter the data and type and get the results
            $(document).on("keyup", '#find', function(e){
                $('#school').val('');
                $('#wd').val('');
                $('#core').val('');
                $('#tool').val('');
                var find = $('#find').val();
                if(find == '')
                {
                    $('#nav').remove();
                    $('#show').hide();
                } 
                //get the data of the table
                else{
                    $.ajax({
                    async:false,
                    url: 'g_C_T_E.php',
                    type: 'POST',
                    data: {find: find}, 
                    dataType : "json",
                    success: function (response) {
                        $('#show').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var j in response){
                            $('#show').append(response[j]);
                        }
                        showTable();
                        $('#show').show();
                    }
                });
                }
                
                
            });
            // get the data through the school and department
            $(document).on("change", '#school', function(e){
                var school = $('#school').val();
                
                $.ajax({
                    async:false,
                    url: 'g_C_T_E.php',
                    type: 'POST',
                    data: {school: school}, 
                    dataType : "json",
                    success: function (response) {
                        $('#show').empty();
                     
                        for (var j in response){
                            $('#show').append(response[j]);
                        }
                        showTable();
                        $('#show').show();
                    }
                });
            });
            // get the deparmtent and course thorugh selecting
            $(document).on("change", '#school', function(e){
                var school = $('#school').val();
                $.ajax({
                    async:false,
                    url: 'get_dept.php',
                    type: 'POST',
                    data: {school: school}, 
                    dataType : "json",
                    success: function (response) {
                        $('#wd').empty();
                        $('#core').empty();
                        $('#tool').empty();
                        for (var j in response){
                            $('#wd').append(response[j]);
                        }
                        }
                });
            });
            $(document).on("change", '#wd', function(e){
                var wd = $('#wd').val();
                $.ajax({
                    async:false,
                    url: 'g_subject.php',
                    type: 'POST',
                    data: {wd: wd}, 
                    dataType : "json",
                    success: function (response) {
                        $('#core').empty();
                        $('#tool').empty();
                        for (var j in response){
                            $('#core').append(response[j]);
                        }
                    }
                });
            });
            // get the courses and sections through that data 
            $(document).on("change", '#wd', function(e){
                var school = $('#school').val();
                var wd = $('#wd').val();
                $.ajax({
                    async:false,
                    url: 'g_C_T_E.php',
                    type: 'POST',
                    data: {school: school, wd: wd}, 
                    dataType : "json",      //first the school and department we will get
                    success: function (response) {
                        $('#show').empty();
                        for (var j in response){
                            $('#show').append(response[j]);
                        }
                        showTable();
                        $('#show').show();
                    }
                });
            });
            $(document).on("change", '#core', function(e){
                var core = $('#core').val();
                $.ajax({
                    async:false,   //then the course will get and the section will be displayed 
                    url: 'get_sec.php',
                    type: 'POST',
                    data: {core: core}, 
                    dataType : "json",
                    success: function (response) {
                        $('#tool').empty();
                        for (var j in response){
                            $('#tool').append(response[j]);

                        }
                    }
                });
            });
            $(document).on("change", '#core', function(e){
                var school = $('#school').val();
                var wd = $('#wd').val();
                var core = $('#core').val();
                $.ajax({                    //get the data 
                    async:false,
                    url: 'g_C_T_E.php',
                    type: 'POST',
                    data: {school: school, wd: wd, core:core}, 
                    dataType : "json",
                    success: function (response) {
                        $('#show').empty();
                        for (var j in response){
                            $('#show').append(response[j]);
                        }
                        showTable();
                        $('#show').show();
                    }
                });
            });

            $(document).on("change", '#tool', function(e){
                var school = $('#school').val();
                var wd = $('#wd').val();
                var core = $('#core').val();
                var tool = $('#tool').val();
                $.ajax({
                    async:false,
                    url: 'g_C_T_E.php',
                    type: 'POST',
                    data: {school: school, wd: wd, core:core, tool:tool}, 
                    dataType : "json",
                    success: function (response) {
                        $('#show').empty();
                       
                        for (var j in response){
                            $('#show').append(response[j]);
                        }
                        showTable();
                        $('#show').show();
                    }
                });
            }); 
            // when add function is clicked then the data is added to the cart and the messgaes are printed if the subject is inserted or if it's already there it shows taht cart has this
            $(document).on("click", '.add', function(e){
                var sti = $(this).attr('id');
                var sid_u = <?php echo $_SESSION['user']['Student_ID']; ?>; 
                $.ajax({
                    async: false,
                    url: 'putincart.php',
                    type: 'POST',
                    data: {sti: sti, sid_u: sid_u},
                    success: function (response){
                        if (response == "Subject is inserted" || response== "Subject is again inserted " ){
                            alert(response);
                        } else {
                            alert("Cart has this subject");
                        }
                    },
                    error: function(e){
                        alert(e.responseText);
                    }
                });
            });

//this function will show the data and the pages will beneath the data
             function showTable(){
                $('#nav').remove();
                    $("#show").after('<div id="nav"></div>');
                    var bind = document.getElementById("show");
                    var count = bind.getElementsByTagName("tr").length;

                    var seen= 6;
                    var number = count;

                   
                    var ruk = bind.getElementsByTagName("tr");
                    
                    var count1 = number/seen;
                    for(i = 0;i < count1;i++) {
                        var web = i + 1;
                        $('#nav').append('<a href="#" rel="'+i+'">'+web+'</a> ');
                    }
                    $(ruk).hide();
                    $(ruk).slice(0, seen).show();
                    $('#nav a:first').addClass('active');
                    $('#nav a').bind('click', function(){

                        $('#nav a').removeClass('active');
                        $(this).addClass('active');
                        var web1 = $(this).attr('rel');
                        var sdate = web1 * seen;
                        var date_e = sdate + seen;
                        $(ruk).hide().slice(sdate, date_e).css('display','table-row').animate({opacity:1}, 310);
                    });

                }
        });
    </script>
        <style>

        table,
        td,
        th {
            /*css for the table*/
            border: 3px solid #ddd;
            text-align: left;
            font-style: italic;
            border-color: lightblue;
            color:blue;
        }
        table {
            border-collapse: 3px;
            border-color: lightblue;
            width: 100%;
            font-style: italic;
            border-color: black;
        }
        th,
        td {
            padding: 15px;

        }
        tr:hover {
            background-color: lightblue;
            color: black;
        }
        td:hover {
            background-color: #ddda2393;
            color: black;
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


</style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: lightblue">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="images/o.jpg">
          <span class="heading" style="text-decoration-color: orange">COURSE REGISTRATION</span>
        </a>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="welcome.html" style="font-size:20px">HOME
              <span class="sr-only">(current)</span>
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




<!-- HOME -->
<section id="home" class="section jumbotron-fluid bg--position-center no-repeat bg-cover md-display-table" >
  
  
    <form method='post' id='form' action="putincart.php">
        
            
            <div class="jumbotron-fluid" >
                FIND SUBJECTS <input class="form-control" type="text" id="find"/>
            </div>
        <br/>
 
<div class="form-inline">
    <div class="form-group">
        <label for="school"> SCHOOL:</label>
        <select name="school" class="form-control" id="school">
            <option value = ""></option>
            <!-- get the data from the columns -->
            <?php
                $con = mysqli_connect('localhost', 'root', 'root', 'course_register');
                $query = "SELECT DISTINCT Coll_name FROM coll_data1";
                $response = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($response)){
                    echo "<option value ='" . $row['Coll_name'] . "'>" . $row['Coll_name'] . "</option>";
                }
                mysqli_close($con);
            ?>
        </select>
    </div>
   <div class="form-group">
        <label for="wd">DEPARTMENT</label>
        
        <select name="wd" class="form-control" id="wd">
            <option value = ""></option>
        </select>
    </div>
    <div class="form-group">
        <label for="core">SUBJECTS</label> 
        <select name="core" class="form-control" id="core">
            <option value = ""></option>
        </select>
    
    </div>
        <div class="form-group">
        <label for="tool">SECTIONS</label> 
        <select name="tool" class="form-control" id="tool">
            <option value = ""></option>
        </select>
        </div>
    
        
       
        
    </form>
            </div>  
   <br/>
    <div>
    <a class="btn btn-primary" style="background-color:black" href='course_cart.php'>GO ON CART</a>
    </div>
    
    </section>

    <section>
    <div class="jumbotron-fluid">
    <table id='show'>
    </table>
    </div>

    </section>
    <section>
    <div class="jumbotron-fluid">
    <table id='show'>
    </table>
    </div>

    </section>
  
  
      <script src="js/jquery-3.1.0.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/main.js"></script></body>

</html>