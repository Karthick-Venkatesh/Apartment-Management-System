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

  //$select_db = mysql_select_db('payroll');
  //if (!$select_db)
  //{
  //  die("Database Selection Failed" . mysql_error());
  //}

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
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Apartment Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="home_employee.php">Tenants</a>
            </li>
            <li class="active">
              <a data-toggle="modal" href="#deductions">Complaints</a>
            </li>
            <li>
              <a href="home_salary.php">Message</a>
            </li>
          </ul>
        </nav>
      </div><br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                
                <p align="center"><big><b>List of Tenants</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Flat ID</p></th>
                          <th><p align="center">Flat owner</p></th>
                          <th><p align="center">Type of Complaint</p></th>
                          <th><p align="center">Complaint Status</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $conn = mysqli_connect('localhost', 'root', '','payroll');
                          if (!$conn)
                          {
                            die("Database Connection Failed" . mysql_error());
                          }

                          //$select_db = mysql_select_db('payroll');
                          //if (!$select_db)
                          //{
                          //  die("Database Selection Failed" . mysql_error());
                          //}
                          
                          $query=mysqli_query($conn,"select * from complaints ORDER BY status desc")or die(mysql_error());
                          while($row=mysqli_fetch_array($query))
                          {
    
                            $id     =$row['t_id'];
                            $flat  =$row['flat_id'];
                            $owner  =$row['owner'];
                            $type   =$row['type'];
                            $status   =$row['status'];

                          
                      
                        ?>

                        <tr>
                          <td align="center"><!--<a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"> --><?php echo $row['flat_id'] ?></a></td>
                          <td align="center"><!--<a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"> --><?php echo $row['owner'] ?></a></td>
                          <td align="center"><!--<a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"> --><?php echo $row['type'] ?></a></td>
                          <td align="center"><!--<a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"> --><?php echo $row['status'] ?></a></td>
                          <td align="center">

                            <a class="btn btn-danger" href="delete_c.php?t_id=<?php echo $row["t_id"]; ?>">Delete</a>
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        <tr class="info">
                          <th><p align="center">Flat ID</p></th>
                          <th><p align="center">Flat Owner</p></th>
                          <th><p align="center">Type of complaint</p></th>
                          <th><p align="center">Complaint Status</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
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