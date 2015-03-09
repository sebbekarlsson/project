<?php

	if($profileUser->userID != $USER->userID){
		return;
	}

?>
<div class="text margin">
	<form action="profile.php?userID=<?php echo $profileUser->userID ?>&doc=settings.php" method="post" enctype="multipart/form-data">
	    <h3>Update profile image</h3>
	    <?php
		    $img = $profileUser->userPicture;
			echo "<img width='20%' src='uploads/$img'><br>";
		?>
	    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
	    <input class="btn green" type="submit" value="Upload Image" name="new_image">
	</form><br><hr><br>
	<form method="post" action="profile.php?userID=<?php echo $profileUser->userID ?>&doc=settings.php">
		<h3>Bio</h3>
		<textarea rows="8" cols="64" name="new_bio"><?php echo $profileUser->userBio; ?></textarea><br>
		<h3>Profession</h3>
		<input class="intext" type="text" name="new_profession" placeholder="What's your profession?" value='<?php echo $profileUser->userProfession; ?>'><br>
		<br><input type="submit" class="btn green" name="new_save" value="Save">
	</form>
	<?php
		if(isset($_POST['new_save'])){
			$userID = $USER->userID;
			$bio = $_POST['new_bio'];
			$profession = $_POST['new_profession'];
			if(substr_count($bio, ">") > 0){
				echo "<p>Bio contains bad chars!</p>";
				return;
			}else if(substr_count($profession, ">") > 0){
				echo "<p>Profession contains bad chars!</p>";
			}
			else{
				$sql = "UPDATE USERS SET userBio='$bio', userProfession='$profession' WHERE userID=$userID";
				mysql_query($sql);
				echo "<p>Information updated!</p>";
			}
		}

		if(isset($_POST['new_image'])){
			$userID = $USER->userID;
			$fname = randomString(6).".png";
			uploadImage($_FILES['fileToUpload'],"uploads",$fname);
			mysql_query("UPDATE USERS SET userPicture='$fname' WHERE userID=$userID");
			echo "<script>window.location.href=window.location.href;</script>";
		}
	?>
</div>