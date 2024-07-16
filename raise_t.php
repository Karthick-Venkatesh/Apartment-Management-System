<?php
  include("db.php"); //include auth.php file on all secure pages
  include("auth.php");
  include("config.php");

  /*
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the button value from the form
    $buttonValue = $_POST['buttonValue'];
  
    // Connect to the database
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  
    // Insert the button value into the database table
    $sql = "INSERT INTO your_table_name (button_value) VALUES ('$buttonValue')";
    if ($conn->query($sql) === TRUE) {
      echo "Value inserted successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
    // Close the database connection
    $conn->close();
  }
*/

  //-----------------------------------------------------------------------------

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Apartment Management System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> 
  <link href="assets/css/docs.min.css" rel="stylesheet"> 
    <link href="assets/css/search.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/styles.css" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>
  
    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index_t.php">Apartment Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>User</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="payments_t.php">Payments</a>
            </li>
            <li>
              <a href="amenities.php">Amenities</a>
            </li>
           
            <li  class="active"><a href="raise_t.php">Raise Issue</a></li>
          </ul>
        </nav>
      </div><br><br>

     
  <style>
    .button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width:200px;
      transition: transform 300ms;
    }
    .button:hover{
    transform: scale(1.1,1.1);
}

@-webkit-keyframes cssAnimation {
  from {
    -webkit-transform: rotate(0deg) scale(1) skew(0deg) translate(100px);
  }
  to {
    -webkit-transform: rotate(0deg) scale(2) skew(0deg) translate(100px);
  }
}
  </style>

  <h2>Select to raise issue for the problem caused in your Apartment </h2>
  
  <form action="#" class="form-horizontal"  name ="form" method="post">


  <input type="hidden" id="buttonValue" name="buttonValue">
  <button type="button"  onclick="setValue(1)"  id="powerCutBtn" value="Power Cut" class="button">Power Cut</button>
  <button type="button" onclick="setValue(2)"   id="cleaningDelayBtn" value="Cleaning Delay" class="button" >Cleaning Delay</button>
  <button type="button" onclick="setValue(3)"   id="slowInternetBtn" value="Slow Internet" class="button" >Slow Internet</button>
  <button type="button" onclick="setValue(4)"  id="brokenFurnitureBtn" value="Broken Furniture" class="button" >Broken Furniture</button> <br> <br>
  <button type="button" onclick="setValue(5)"   id="brokenFurniture" value="Tiling problems"class="button" >Tiling problems</button>
  <button type="button" onclick="setValue(6)"  id="brokenFurnmm" value="wall cracking" class="button" >wall cracking</button>
  <button type="button" onclick="setValue(7)"  id="brokenFur" value="water leaks" class="button" >water leaks</button>

<script>
 
  function setValue(value) {
    function ani() {
  document.getElementById('buttonvalue').className = 'button';
}
    var type = value; // Assign the value to the type variable
    document.getElementById("buttonValue").value = type;
    document.getElementById("buttonvalue").addEventListener("click", runScript);
  }
  
</script>
  </form>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                        <h3 align="center">You are logged in as user </h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
function(runscript){
//----------------------------------------------------------------------------
  $sql = mysqli_query($connection, "SELECT * FROM employee WHERE emp_id='1'");

  if ($row = mysqli_fetch_array($sql)) {
      $id     = $row['emp_id'];
      $flat   = $row['lname'];
      $owner  = $row['fname'];
   //   $type   = $row['type'];
    //  $status = $row['status'];
  
      $insertQuery = "INSERT INTO complaints (t_id, flat_id,owner) 
                      VALUES ('$id', '$flat', '$owner')";
  
      mysqli_query($connection, $insertQuery);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the button value from the form
   // $type = $_POST['type'];
    $type= $_POST['buttonValue'];
  $status = $_POST['status']; 
  
  $insertQuery = "INSERT INTO complaints (type, status) 
                  VALUES ('$type', '$status')";
  
  mysqli_query($connection, $insertQuery);
  }
}
</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    
    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });

      document.getElementById("powerCutBtn").addEventListener("click", function() {
      alert("issuse has been transformed to admin");
      // Perform any other action related to power cut
    });
    
    // Cleaning Delay button event listener
    document.getElementById("cleaningDelayBtn").addEventListener("click", function() {
      alert("issuse has been transformed to admin");
      // Perform any other action related to cleaning delay
    });
    
    // Slow Internet button event listener
    document.getElementById("slowInternetBtn").addEventListener("click", function() {
      alert("issuse has been transformed to admin");
      // Perform any other action related to slow internet
    });
    
    // Broken Furniture button event listener
    document.getElementById("brokenFurnitureBtn").addEventListener("click", function() {
      alert("issuse has been transformed to admin");
      // Perform any other action related to broken furniture
    });
    document.getElementById("brokenFurniture").addEventListener("click", function() {
      alert("Issuse has been transformed to admin");
    });

      document.getElementById("brokenFurnmm").addEventListener("click", function() {
      alert("Issuse has been transformed to admin");
    });

      document.getElementById("brokenFur").addEventListener("click", function() {
      alert("Issuse has been transformed to admin");
    });
    </script>


  </body>
</html>