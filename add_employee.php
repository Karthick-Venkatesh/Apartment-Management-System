<?php

  $conn = mysqli_connect('localhost', 'root', '','payroll');
  if (!$conn)
  {
    die("Database Connection Failed" . mysql_error());
  }

  //$select_db = mysql_select_db('payroll');
  //if (!$select_db)
  //{
 //   die("Database Selection Failed" . mysql_error());
 // }

  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = mysqli_query($conn,"INSERT into employee(lname, fname, gender, emp_type, division)VALUES('$lname','$fname','$gender', '$type', '$division')");

    if($sql)
    {
      ?>
        <script>
            alert('Tenant has been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>