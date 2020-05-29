
<?php
session_start()
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
  <link rel="stylesheet" href="css/main.css">
 <!-- this page shows the history of the table -->
 
    <script>
      //get the user data form this page with queries and display the table
        $(document).ready(function(){
            var sid_u = <?php echo $_SESSION['user']['Student_ID'];?>;
            $.ajax({
                async: false,
                url: 'getHistory.php',
                type: 'POST',
                data: {sid_u: sid_u, snow:"lend1"},
                dataType: 'json',
                success: function(response) {
                    $('#show').empty();
                    for (var j in response){
                        $('#show').append(response[j]);
                    }
                }

            });
          
        });
    </script>
    <style>


          table,
        td,
        th {
        /*css for the table how table will look*/
            border: 3px solid #ddd;
            text-align: left;
            font-style: italic;
            border-color: lightblue;
            color:blue;
        }
        table {
            border-collapse: 3px;
            border-color: lightblue;
            border:2px;
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

  <section id="home" class="section jumbotron-section bg--position-center no-repeat bg-cover md-display-table" >
  <div>
     <table id='show'>
    </table>
    <br/>
    <div>
    
    <div>
    <a class="btn btn-primary" href='<?php if($_SESSION['user']['type_u'] == "user") { echo "goto.php"; } else { echo "home.php"; };?>'>GO ON PAGE</a>
    </div>
    </div>
  </section>
<footer style="background-color: lightblue">
    <section class="bf">
      <div class="container">
        <hr class="df">
        <div class="row">
          <div class="col-md-4">
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
  
      <script src="js/jquery-3.1.0.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/main.js"></script></body>

</body>

</html>