<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset =  "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<title>
			Mid Test
		</title>
		
	</head>
	
	<body>
		
		<?php
			include('header.php');
		?>
		
		<div class = "header">
			<div class = "sv_banner">
				<b>
					TẠO MỚI THÔNG TIN
				</b>
			</div>
		</div>
		
		<div class = "body">
			<div class = "manager">
				<div class = "navigator-col">
					<ul>
						<li class = "no-decor">
							<a href = "#" CLASS = "navigator-item">
								<b>
									DANH BẠ
								</b>
							</a>
						</li>
						<li class = "no-decor">
							<a href = "add.php" CLASS = "navigator-item">
								<b>
									THÊM MỚI
								</b>
							</a>
						</li>
					</ul>
				</div>
				
				<div class = "information-col">
					<div class = "info-section">
						<form method = "POST" action = "porcess_add.php">
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Họ và Tên: 
									</b>
								</div>
								<div class = "col-9">
									<input type = "text" name = "input-name" class = "info-form-input-text" >
								</div>
							</div>
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Mật khẩu: 
									</b>
								</div>
								<div class = "col-9">
									<input type = "password" name = "input-pass" class = "info-form-input-text">
								</div>
							</div>
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Vị trí: 
									</b>
								</div>
								<div class = "col-9">
									<input type = "text" name = "input-pos" class = "info-form-input-text">
								</div>
							</div>
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Phòng/bộ môn: 
									</b>
								</div>
								<div class = "col-9">
									<select name = "input-subunit" class = "info-form-input-text">
										<?php
											require_once('mysqli_connect.php');
											$query2 = "select * from `subunit`";
											$q2 = mysqli_stmt_init($dbcon);
											mysqli_stmt_prepare($q2, $query2);
											mysqli_stmt_execute($q2);
											
											$result = mysqli_stmt_get_result($q2);
											while($row2 = mysqli_fetch_array($result, MYSQLI_ASSOC))
											{
												echo '<option value="' .$row2['subid'].  '">' .$row2['subname']. '</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Email: 
									</b>
								</div>
								<div class = "col-9">
									<input type = "text" name = "input-email" class = "info-form-input-text">
								</div>
							</div>
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Đt cơ quan: 
									</b>
								</div>
								<div class = "col-9">
									<input type = "text" name = "input-workphone" class = "info-form-input-text">
								</div>
							</div>
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Đt cá nhân: 
									</b>
								</div>
								<div class = "col-9">
									<input type = "text" name = "input-personalphone" class = "info-form-input-text">
								</div>
							</div>
							<div class = "row info-row">
								<div class = "col-3">
									<b>
										Quyền admin: 
									</b>
								</div>
								<div class = "col-9">
									<select name = "input-admin" class = "info-form-input-text">
										<option value = "0">Không</option>
										<option value = "1">Có</option>
									</select>
								</div>
							</div>
					
							<div class = "update-delete info-row">
								<input type = "submit" class = "info-submit-button" value = "Tạo mới" name = "update">
							</div>
						</form>
			
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>