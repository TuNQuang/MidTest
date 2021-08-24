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
				THÔNG TIN CÁ NHÂN
			</div>
		</div>
		
		
		<div class = "info-section">
			<?php
				require_once('mysqli_connect.php');
				
				$query = "select * from `users` INNER JOIN subunit on users.subunitid = subunit.subid  inner join unit on subunit.unit = unit.unitid where userid = ?";
				$q = mysqli_stmt_init($dbcon);
				mysqli_stmt_prepare($q, $query);
				mysqli_stmt_bind_param($q, "s", $_GET['id']);
				mysqli_stmt_execute($q);
				
				$result = mysqli_stmt_get_result($q);
				$row = mysqli_fetch_assoc($result);
			?>
			
			<form method = "POST" action = "process_update_delete.php">
				<input type = "hidden" name = "input-id" value = "<?php echo $_GET['id']?>">
				<div class = "row info-row">
					<div class = "col-2">
						<b>
							Họ và Tên: 
						</b>
					</div>
					<div class = "col-10">
						<input type = "text" name = "input-name" class = "info-form-input-text" value = "<?php echo $row['username'];?>">
					</div>
				</div>
				<div class = "row info-row">
					<div class = "col-2">
						<b>
							Vị trí: 
						</b>
					</div>
					<div class = "col-10">
						<input type = "text" name = "input-pos" class = "info-form-input-text" value = "<?php echo $row['position'];?>">
					</div>
				</div>
				<div class = "row info-row">
					<div class = "col-2">
						<b>
							Phòng/bộ môn: 
						</b>
					</div>
					<div class = "col-10">
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
					<div class = "col-2">
						<b>
							Email: 
						</b>
					</div>
					<div class = "col-10">
						<input type = "text" name = "input-email" class = "info-form-input-text" value = "<?php echo $row['email'];?>">
					</div>
				</div>
				<div class = "row info-row">
					<div class = "col-2">
						<b>
							Đt cơ quan: 
						</b>
					</div>
					<div class = "col-10">
						<input type = "text" name = "input-workphone" class = "info-form-input-text" value = "<?php echo $row['workphone'];?>">
					</div>
				</div>
				<div class = "row info-row">
					<div class = "col-2">
						<b>
							Đt cá nhân: 
						</b>
					</div>
					<div class = "col-10">
						<input type = "text" name = "input-personalphone" class = "info-form-input-text" value = "<?php echo $row['personalphone'];?>">
					</div>
				</div>
				<?php
					if(isset($_SESSION['uname']))
					{
						echo '<div class = "row info-row">
								<div class = "col-2">
									<b>
										Quyền admin: 
									</b>
								</div>
								<div class = "col-10">
									<select name = "input-admin" class = "info-form-input-text">
										<option value = "0">Không</option>
										<option value = "1">Có</option>
									</select>
								</div>
							</div>
					
						<div class = "update-delete info-row">
							<input type = "submit" class = "info-submit-button" value = "Cập nhật" name = "update">
							<input type = "submit" class = "info-submit-button" value = "Xóa" name = "delete">
						</div>';
					}
				?>
			</form>
			
		</div>
	</body>
</html>