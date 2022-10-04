
<html>

<head>
	<title>LecLogin</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="heading">
		<h2>Lecturer Login</h2>
	</div>

	<form method="post" id="leclogin" action="login.php" onSubmit="return validateForm()">
		<div class="inputform">
			<label>Role ID</label>
			<input type="text" id="role_id" name="role_id">
		</div>
		<div class="inputform">
			<label>Password</label>
			<input type="password" id="password" name="password">
		</div>
		<div class="inputform">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="lecturerregistration.php">Sign up</a><br>
			<a href="../index.php">HOME PAGE</a>
		</p>
	</form>
	<script>
		function validateForm() {
			//validate role_id
			//if role ID is empty
			role_id = document.getElementById("role_id").value;
			if (role_id == "" || role_id.length < 4) {
				alert("Please enter your Role ID");
				document.getElementById("role_id").focus();
				return false;
			}
			//validate password
			password = document.getElementById("password").value;
			if (password == "" || password.length < 8) {
				alert("Password should not be empty and it should have more than 8 characters");
				document.getElementById("password").focus();
				return false;
			}

		}
	</script>

</body>

</html>