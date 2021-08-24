<div class = "info-row _border">
	<div class = "info-row-style name-section ">
		<a href = "userinfo.php?id=<?php echo $row['userid']; ?>">
			<?php
				echo $row['username'];
			?>
		</a>
	</div>
	<div class = "info-row-style pos-section ">
		<?php
			echo $row['position'];
		?>
	</div>
	<div class = "info-row-style same-section ">
		<?php
			echo $row['email'];
		?>
	</div>
	<div class = "info-row-style same-section">
		<?php
			if($row['workphone'] == 0)
			{
				echo "";
			}
			else echo $row['workphone'];
		?>
	</div>
	<div class = "info-row-style same-section ">
		<?php
			if($row['personalphone'] == 0)
			{
				echo "";
			}
			else echo $row['personalphone'];
		?>
	</div>
</div>