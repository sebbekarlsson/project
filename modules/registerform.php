<div class="backdrop" id="registerform">
	<div class="app">
		<div class="text">
			<h2>Register</h2><br>
			<input class="intext" type="text" id="reg_email" placeholder="email"><br>
			<input class="intext" type="text" id="reg_firstname" placeholder="firstname"><br>
			<input class="intext" type="text" id="reg_lastname" placeholder="lastname"><br><br>
			<select id="reg_birth" class="select">
				<option selected value="#">Birth</option>
				<?php

					for($i = 1800; $i < 2014; $i++){
						echo "<option value='$i'>$i</option>";
					}

				?>
			</select><br><br>
			<input class="intext" type="password" id="reg_password1" placeholder="password"><br>
			<input class="intext" type="password" id="reg_password2" placeholder="confirm password">
		</div><br>
		<div class="response">
		</div><br><br>
		<a class="btn register green" href="#">Register</a>
		<a class="btn app_close red" href="#">Close</a><br><br>
		<script>
			$(".register").click(function(){
				var email = $("#reg_email").val();
				var firstname = $("#reg_firstname").val();
				var lastname = $("#reg_lastname").val();
				var birth = $("#reg_birth").val();
				var password1 = $("#reg_password1").val();
				var password2 = $("#reg_password2").val();

				var request = $.ajax({
					type:"post",
					cache:false,
					url:"apps/register.php",
					data:{
						reg_email: email,
						reg_firstname: firstname,
						reg_lastname: lastname,
						reg_birth: birth,
						reg_password1: password1,
						reg_password2: password2}
				});

				request.done(function(data){
					$(".response").html(data);
				});
			});
		</script>
	</div>
</div>
