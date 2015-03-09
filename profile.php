<?php include("modules/API.php");?>
<?php

	$ID = $_GET['userID'];
	$profileUser = new User($ID);

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="apps/jquery.js"></script>
		<script type="text/javascript" src="apps/main.js"></script>
	</head>

	<body>
		<?php include("modules/registerform.php"); ?>
		<?php include("modules/loginform.php"); ?>
		<?php include("modules/navbar.php"); ?>
		<div class="content">
			<div class="page">
				<div class="pagemenu">
					<a class="menubtn" href="profile.php?userID=<?php echo $ID; ?>&doc=about.php"><span>About</span></a>
					<a class="menubtn" href="profile.php?userID=<?php echo $ID; ?>&doc=projects.php"><span>Projects</span></a>
					<a class="menubtn" href="profile.php?userID=<?php echo $ID; ?>&doc=friends.php"><span>Friends</span></a>
					<?php
						if($profileUser->userID == $USER->userID)
						echo '<a class="menubtn" href="profile.php?userID='.$ID.'&doc=settings.php"><span>Settings</span></a>';
					?>
				</div>
				<div class="pageright">
					<?php

						$doc = $_GET['doc'];
						include("modules/profile/$doc");

					?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
	</body>

	<footer>
		<?php include("modules/close.php"); ?>
	</footer>
</html>