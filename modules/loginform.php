<div class="backdrop" id="loginform">
	<div class="app">
		<div class="text">
			<h2>Login</h2><br>
			<input class="intext" type="text" id="login_email" placeholder="email"><br>
			<input class="intext" type="password" id="login_password" placeholder="password"><br>
		</div><br>
		<div class="response"></div><br><br>
		<a class="btn login green" href="#">Login</a>
		<a class="btn app_close red" href="#">Close</a><br><br>
		<script>
			$(".login").click(function(){
				var email = $("#login_email").val();
				var password = $("#login_password").val();

				var request = $.ajax({
					type:"post",
					cache:false,
					url:"apps/login.php",
					data:{login_email: email, login_password: password}
				});

				request.done(function(data){
					$(".response").html(data);
				});
			});
		</script>
	</div>
</div>
