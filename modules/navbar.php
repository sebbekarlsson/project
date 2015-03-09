<div class="navbar">
	<div class="navleft">
		<ul>
			<li><a class="navbtn" href="index.php">News</a></li>
			<li><a class="navbtn" href="projects.php">Projects</a></li>
			<li><a class="navbtn" href="people.php">People</a></li>
		</ul>
	</div>
	<div class="navright">
		<ul>
			<?php
				if(!$loggedin){
					echo"
					<li><a class='navbtn app_pop' href='#' id='registerform'>Sign up</a></li>
					<li><a class='navbtn app_pop' href='#' id='loginform'>Login</a></li>";
				}else{
					echo
					"
					<li><a class='navbtn' href='profile.php?userID=$USER->userID&doc=about.php'>".$USER->userFirstname."</a></li>
					<li><a class='navbtn' href='logout.php' title='warning, brain damage'>Logout</a></li>
					";
				}
			?>
			<li>
				<input class="intext" type="text" name="q" placeholder="search...">
				<input class="btn green" type="submit" value="Search">
			</li>
		</ul>
	</div>
</div>