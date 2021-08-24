<?php
	require_once('mysqli_connect.php');
	$query = "SELECT * FROM `users` WHERE username like '%" . $_POST['uname']  . "%'";
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_execute($q);
	
	$result = mysqli_stmt_get_result($q);
	
	while($row = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		echo $row[1]. "<br>" .$row[2]. "<br>";
	}
?>
