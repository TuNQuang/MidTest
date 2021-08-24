<?php
	require_once('mysqli_connect.php');
	$query = "select * from users where email = ? and userpass = ?";
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "ss", $_POST['u_input'], $_POST['p_input']);
	mysqli_stmt_execute($q);
	
	$result = mysqli_stmt_get_result($q);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if(mysqli_num_rows($result) == 1)
	{
		session_start();
		$_SESSION['uname'] = $row['username'];
		$_SESSION['adminstat'] = $row['adminstatus'];
		
		echo "<script type='text/javascript'>alert('Đăng nhập thành công. Bạn sẽ được đưa về trang chủ');</script>";
		header("refresh: 0; url=index.php");
	}
	else
	{
		echo "<script type='text/javascript'>alert('Bạn đã nhập sai tên hoặc mật khẩu');</script>";
		header("refresh: 0; url=login.php");
	}
	
?>