<div class="text margin">
	<?php echo "<h2><i>$profileUser->userFirstname $profileUser->userLastname</i></h2>";?>
	<br>
	<?php
		$img = $profileUser->userPicture;
		echo "<img width='20%' src='uploads/$img'>";
		echo "<div class='text'>";

			echo "<h2>Bio</h2>";
			echo "<div class='text nomargin'><p>";
				echo $profileUser->userBio;
			echo "</p></div>";

			echo "<h2>Profession</h2>";
			echo "<div class='text nomargin'>";
				echo "<p>";
					echo getProfessionName($profileUser->userProfessionID);
				echo "</p>";
			echo "</div>";

			echo "<h2>Other</h2>";
			echo "<div class='text nomargin'>";
					echo "<ul>";
						echo "<li>Birth: $profileUser->userBirthyear</li>";
						echo "<li>Email: $profileUser->userEmail</li>";
					echo "</ul>";
			echo "</div>";

		echo "</div>";
	?>
</div>