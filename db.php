<?php
	$connection = mysqli_connect('localhost', 'root', '','payroll');

	if (!$connection)
	{
		die("Database Connection Failed" . mysql_error());
	}

	//$select_db = mysql_select_db('payroll');
	//if (!$select_db)
	//{
	//	die("Database Selection Failed" . mysql_error());
	//}
?>