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
		
		<div class = "body">
			<div class = "sv_banner">
				Thông tin
			</div>
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
							$query = "select * from `users` where " . $_POST['kw-type'] . "='" . $_POST['searchbox'] . "'";
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
			
			<div class = "search-section">
				<form method = "POST" action = "index.php">
					<label>
						Từ khóa:
					</label>
					<input type = "text" id = "searchbox" name = "searchbox" placeholder = "Nhập từ khóa">
					<label>
						Tìm kiếm theo:
					</label>
					<select id = "kw-type" name = "kw-type">
						<option value="username">Họ và tên</option>
						<option value="position">Chức vụ</option>
						<option value="email">Email</option>
						<option value="workphone">ĐT. Cơ quan</option>
						<option value="personalphone">ĐT. Cá nhân</option>
					</select>
					<input type = "submit" value = "Tìm kiếm">
				</form>
			</div>
			
		</div>
		
		
	</body>
	
</html>