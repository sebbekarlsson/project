<div class="text margin">
	<form method="post" action="profile.php?doc=settings.php">
		<h3>Bio</h3>
		<textarea rows="16" cols="64" name="new_bio"><?php echo $USER->userBio; ?></textarea><br>
		<input type="submit" class="btn green" name="new_save" value="Save">
	</form>
	<form action="profile.php?doc=settings.php" method="post" enctype="multipart/form-data">
	    Update profile Image
	    <input class="btn green" type="file" name="fileToUpload" id="fileToUpload"><br>
	    <input class="btn green" type="submit" value="Upload Image" name="new_image">
	</form>
	<?php
		if(isset($_POST['new_save'])){
			$userID = $USER->userID;
			$bio = $_POST['new_bio'];
			if(substr_count($bio, ">") > 0){
				echo "<p>Bio contains bad chars!</p>";
			}else{
				$sql = "UPDATE USERS SET userBio='$bio' WHERE userID=$userID";
				mysql_query($sql);
				echo "<p>Information updated!</p>";
			}
		}

		if(isset($_POST['new_image'])){
			$userID = $USER->userID;
			$fname = randomString(6).".png";
			uploadImage($_FILES['fileToUpload'],"uploads",$fname);
			mysql_query("UPDATE USERS SET userPicture='$fname' WHERE userID=$userID");
		}
	?>
</div>