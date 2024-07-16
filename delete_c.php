<?php
	require('db.php');

	$id=$_GET['t_id'];
	$query = "DELETE FROM complaints WHERE t_id=$id"; 
	$result = mysqli_query($connection,$query) or die ( mysql_error());
	header("Location: home_deductions.php");

?>