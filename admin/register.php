<html>

<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="templates/style.css">
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form id="adminreg" method="post" action="./includes/server.php" onSubmit="return validateForm()">
		<div class="inputform">
			<label>Username</label>
			<input type="text" id="username" name="username" value="">
		</div>
		<div class="inputform">
			<label>Email</label>
			<input type="email" id="email" name="email" value="">
		</div>
		<div class="inputform">
			<label>Password</label>
			<input type="password" id="password_1" name="password_1">
		</div>
		<div class="inputform">
			<label>Confirm password</label>
			<input type="password" id="password_2" name="password_2">
		</div>
		<div class="inputform">
			<button type="submit" class="btn" id="reg_user" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="leclogin.php">Sign in</a>
		</p>
	</form>
	<script>
		function validateForm() {
			//if username is empty
			username = document.getElementById("username").value;
			if (username == "" || username.length < 4) {
				alert("Please enter your Username");
				document.getElementById("username").focus();
				return false;
			}
			//validating password1
			password_1 = document.getElementById("password_1").value;
			if (password_1 == "" || password_1.length < 8) {
				alert("Password should not be empty and it should have more than 8 characters");
				document.getElementById("password_1").focus();
				return false;
			}
			//validating password2
			password_2 = document.getElementById("password_2").value;
			if (password_2 == "" || password_2.length < 8) {
				alert("Password should not be empty and it should have more than 8 characters");
				document.getElementById("password_2").focus();
				return false;
			}
		}
	</script>
</body>

</html>