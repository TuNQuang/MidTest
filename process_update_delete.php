<?php
	require_once('mysqli_connect.php');
	$query = "";
	$q = mysqli_stmt_init($dbcon);
	if(isset($_POST['update']))
	{
		$query = "UPDATE `users` 
			SET `username`= ?,
			`email`= ?,
			`workphone`= ?,
			`personalphone`= ?,
			`subunitid`= ?,
			`adminstatus`= ?,
			`position`=? 
			WHERE `userid` = ? ";
		mysqli_stmt_prepare($q, $query);
		mysqli_stmt_bind_param($q, "ssssssss", $_POST['input-name'],
												$_POST['input-email'],
												$_POST['input-workphone'],
												$_POST['input-personalphone'],
												$_POST['input-subunit'],
												$_POST['input-admin'],
												$_POST['input-pos'],
												$_POST['input-id']);
		mysqli_stmt_execute($q);
		
		
		if(mysqli_affected_rows($dbcon) == '1')
		{
			echo "<script type='text/javascript'>alert('Cập nhật thành công.');</script>";
			header("refresh: 0; url=manager.php");
		}
	}
	else
	{
		$query = "DELETE FROM `users` WHERE `userid` = ?";
		mysqli_stmt_prepare($q, $query);
		mysqli_stmt_bind_param($q, "s", $_POST['input-id']);
		mysqli_stmt_execute($q);
		
		if(mysqli_affected_rows($dbcon) == '1')
		{
			echo "<script type='text/javascript'>alert('Đã xóa.');</script>";
			header("refresh: 0; url=manager.php");
		}
	}
?>