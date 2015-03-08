<div class="text margin">
	<?php echo "<h2>$USER->userFirstname $USER->userLastname</h2>";?>
	<br>
	<?php
		$img = $USER->userPicture;
		echo "<img width='20%' src='uploads/$img'>";
		echo "<div class='text nomargin'><p>";
			echo $USER->userBio;
		echo "</p></div>";
	?>
</div>