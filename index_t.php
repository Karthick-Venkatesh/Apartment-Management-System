<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");
  
  
?>

<?php

  $conn = mysqli_connect('localhost', 'root', '','payroll');
  if (!$conn)
  {
    die("Database Connection Failed" . mysql_error());
  }

 // $select_db = mysql_select_db('payroll');
  //if (!$select_db)
 // {
 //   die("Database Selection Failed" . mysql_error());
 // }

  $query  = mysqli_query($conn,"SELECT * from deductions");
  while($row=mysqli_fetch_array($query))
  {
    $id           = $row['deduction_id'];
    $philhealth   = $row['philhealth'];
    $bir          = $row['bir'];
    $gsis         = $row['gsis'];
    $love         = $row['pag_ibig'];
    $loans        = $row['loans'];

    $total        = $philhealth + $bir + $gsis + $love + $loans;
  }
  
  //$query = "SELECT * FROM `user_t` WHERE username='$username'";
  //$result = mysqli_query($conn,$query) or die(mysql_error());

       /* $query=mysqli_query($conn,"select * from user ORDER BY id asc")or die(mysql_error());
        while($row=mysqli_fetch_array($query))
        {
          $uname  =$row['username'];
        }*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title></title>

    <script>
      
        var ScrollMsg= "Apartment Management System  "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body style="background-image: url('img/bc_t.jpg');background-attachment: fixed; background-repeat: no-repeat; background-size: cover">

    <div class="container">
      <div class="masthead">
        <h3>
          <b>Apartment Management System</b>
          <a data-toggle="modal" href="#colins" class="pull-right"><b>User</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li><a href="payments_t.php">Payments</a></li>
            <li><a href="amenities.php">Amenities</a></li>
            <li><a href="raise_t.php">Raise issues</a></li>
          </ul>
        </nav>
      </div><br>

     <!-- Jumbotron -->
     <div class="jumbotron">
        <h3>Common Bulletin</h3>
       <p id="t_btin-id">
        </p>
 <!-- 
<p id="t_btin-id" name="t_btin"></p>
-->
         </div>
<script>
      const bulletin = sessionStorage.getItem('textmsg');
      document.getElementById('t_btin-id').innerHTML = bulletin;
</script>
      
          
      <!-- this modal is for login -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>

              <?php $uname = $_SESSION['uname']; ?>
              <h3 align="center">You are logged in as <b><?php echo $uname; ?></b></h3>
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
    </script>

  </body>
</html>