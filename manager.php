<?php
	session_start();
	if(!isset($_SESSION['uname']))
	{
		header("refresh: 0; url=login.php");
	}
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
			include ('header.php');
		?>
		<div class = "header">
			<div class = "sv_banner">
				TRANG QUẢN LÝ DANH BẠ ĐẠI HỌC THỦY LỢI
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
					<div class = "search-section">
						<form method = "POST" action = "manager.php">
							<label>
								Từ khóa:
							</label>
							<input type = "text" name = "searchbox" placeholder = "Nhập từ khóa">
							<label>
								Tìm kiếm theo:
							</label>
							<select name = "kw-type">
								<option value="username">Họ và tên</option>
								<option value="position">Chức vụ</option>
								<option value="email">Email</option>
								<option value="workphone">ĐT. Cơ quan</option>
								<option value="personalphone">ĐT. Cá nhân</option>
							</select>
							<input type = "submit" value = "Tìm kiếm" name = "search-btn">
						</form>
					</div>
					
					<div class = "filter-section">
						
						<form method = "POST" action = "manager.php">
							<b>
								Bộ lọc:
							</b>
							<select id = "unit-type" name = "unit-type">
								<?php
									require_once('mysqli_connect.php');
									$query = "select * from `subunit`";
									$q = mysqli_stmt_init($dbcon);
									mysqli_stmt_prepare($q, $query);
									mysqli_stmt_execute($q);
									
									$result = mysqli_stmt_get_result($q);
									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
									{
										echo '<option value="' .$row['subid'].  '">' .$row['subname']. '</option>';
									}
								?>
							</select>
							<input type = "submit" value = "Lọc" name ="filter-btn">
							
						</form>
					</div>
					<div class = "infor-manager-section">
						<div class = "info-table">
							<div class = "info-header _border">
								<div class = "header-row-style name-section ">
									Họ và tên
								</div>
								<div class = "header-row-style pos-section ">
									Chức vụ
								</div>
								<div class = "header-row-style same-section ">
									Email
								</div>
								<div class = "header-row-style same-section ">
									ĐT. Cơ quan
								</div>
								<div class = "header-row-style same-section ">
									ĐT. Cá nhân
								</div>
							</div>
							<div class = "info-row _border">
								<?php
									require_once('mysqli_connect.php');
									$query = "";
									if($_SERVER['REQUEST_METHOD'] == "POST")
									{
										if(isset($_POST['search-btn']))
										{
											$query = "select * from `users` where " . $_POST['kw-type'] . "='" . $_POST['searchbox'] . "'";
										}
										if(isset($_POST['filter-btn']))
										{
											$query = "select * from `users` where `subunitid` = '" . $_POST['unit-type'] . "'";
										}
									}
									else $query = "select * from users";
									$q = mysqli_stmt_init($dbcon);
									mysqli_stmt_prepare($q, $query);
									mysqli_stmt_execute($q);
									
									$result = mysqli_stmt_get_result($q);
									
									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
									{
										include('info-row.php');
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>