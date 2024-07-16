<?php
  include("db.php"); //include auth.php file on all secure pages
  include("auth.php");
  include("config.php");
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Amenities</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/search.css" rel="stylesheet">
  
  <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> 
     <link href="assets/css/docs.min.css" rel="stylesheet"> 
    <link href="assets/css/search.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/styles.css" /> 
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  
  
  <style>

.gridviewcontainer {
    text-align: center;
    height:300px;width:auto;
}

.gridviewitem {
    display: inline-block;
    margin-right: 20px;
    max-width: 500px;
    min-width: 150px;
    margin-bottom: 20px;
    transition: transform 300ms;
}

.gridviewitem:hover{
    transform: scale(1.1,1.1);
}

.gridviewitem img {
  height:200px;
    width: 280px;
}
</style>
</head>

<body >


  <div class="container">
    <div class="masthead">
      <h3>
        <b><a href="index_t.php">Apartment Management System</a></b>
        <a data-toggle="modal" href="#colins" class="pull-right"><b>User</b></a>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="payments_t.php">Payments</a></li>
          <li  class="active"><a href="">Amenities</a></li>
          <li><a href="raise_t.php">Raise Issue</a></li>
        </ul>
      </nav>
    </div><br><br>
</div>

<?php

        $conn = mysqli_connect('localhost', 'root', '','payroll');
        if (!$conn)
        {
            die("Database Connection Failed" . mysql_error());  
        }

        $uname = $_SESSION['uname'];
        $query = "SELECT * from employee where fname='".$uname."'";
        $result = mysqli_query($connection,$query) or die ( mysql_error());

        while ($row = mysqli_fetch_array($result))
        {
            $division = $row['division'];
        }
        ?>
<div class="gridviewcontainer" id="gridviewcontainer">

  <div   class="gridviewitem" id="gridviewitem1"><button type="button" onclick="location.href='mail_handler.php'" > <img src="img/partyhall.jpeg" height ="150px" width="auto" /></button></div>
  <div   class="gridviewitem" id="gridviewitem2"><button type="button"onclick="location.href='mail_handler.php'"> <img src="img/bar.jpeg" height ="150px" width="auto" /></button></div>
  <div   class="gridviewitem" id="gridviewitem3"><button type="button"onclick="location.href='mail_handler.php'"> <img src="img/parking.jpeg" height ="150px" width="auto" /></button></div>
  <div   class="gridviewitem" id="gridviewitem4"><button type="button"onclick="location.href='mail_handler.php'"> <img src="img/pool.jpeg" height ="150px" width="auto" /></button></div>
  <div   class="gridviewitem" id="gridviewitem5"><button type="button"onclick="location.href='mail_handler.php'"> <img src="img/pet.jpeg" height ="150px" width="auto" /></button></div>
  <div   class="gridviewitem" id="gridviewitem6"><button type="button"onclick="location.href='mail_handler.php'"> <img src="img/play.jpeg" height ="150px" width="auto" /></button></div>
  <div   class="gridviewitem" id="gridviewitem7"><button type="button"onclick="location.href='mail_handler.php'"> <img src="img/gym.jpeg" height ="150px" width="auto" /></button></div>
  <div   class="gridviewitem" id="gridviewitem8"><button type="button"onclick="location.href='mail_handler.php'"> <img src="img/carwash.jpeg" height ="150px" width="auto" /></button></div>
</div> 
   
        
 <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="colins" role="dialog">
      <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
           <?php $uname = $_SESSION['uname'];?>
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

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>