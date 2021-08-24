<?php
	require_once('mysqli_connect.php');
	$q = mysqli_stmt_init($dbcon);
	$query = "INSERT INTO `users`(`username`, `userpass`, `email`, `workphone`, `personalphone`, `subunitid`, `adminstatus`, `position`) 
	VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "ssssssss", $_POST['input-name'],
											$_POST['input-pass'],
											$_POST['input-email'],
											$_POST['input-workphone'],
											$_POST['input-personalphone'],
											$_POST['input-subunit'],
											$_POST['input-admin'],
											$_POST['input-pos']);
	mysqli_stmt_execute($q);
	
	
	if(mysqli_affected_rows($dbcon) == '1')
	{
		echo "<script type='text/javascript'>alert('Tạo mới thành công');</script>";
		header("refresh: 0; url=login.php");
	}
	else
	{
		echo "<script type='text/javascript'>alert('Xin thử lại');</script>";
		header("refresh: 0; url=add.php");
	}
	
?>