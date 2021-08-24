<div class = "header">
	<div class = "sv_banner">
		145 106 2082 - Nguyễn Quang Tú - Kiểm tra giữa kỳ
	</div>
	<div class = "row top-row">
		<div class = "col-6 left-header">
			<a href = "index.php" class = "no-decor home-link">
				Danh bạ thông tin cán bộ Đại học Thủy Lợi
			</a>
		</div>
		<div class = "col-6">
			<div class = "manager-guest">
				<?php
					if(!isset($_SESSION['uname']))
					{
						echo '<a href = "login.php" class = "button-like-link no-decor">';
							echo 'Đăng nhập';
						echo '</a>';
					}
					else
					{
						echo '<a href = "logout.php" class = "no-decor home-link">';
							echo 'Xin chào ' . $_SESSION['uname'];
						echo '</a>';
						echo '<a href = "manager.php" class = "no-decor home-link">
								Đến trang quản lý
							</a>';
					}
				?>
			</div>
		</div>	
	</div>
</div>