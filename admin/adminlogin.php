<html>

<head>
	<title>Admin registration</title>
	<link rel="stylesheet" type="text/css" href="templates/style.css">
	<link rel="stylesheet" href="templates/admin1.css" />
</head>

<body>
	<div id="top-navigation">
		<div id="logo"> CIAMS</div>
		<div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
			</span><span style="font-family:serif"><?php echo "Admin" ?></span></div>
		<div class="heading">
			<h2>Admin Login</h2>
		</div>

		<form method="post" id="adminlogin" action="login.php" onSubmit="return validateForm()">
			<div class="inputform">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="inputform">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="inputform">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
			<p>
				<!-- Not yet a member? <a href="register.php">Sign up</a> -->
				Go to home page <a href="../index.php">Home</a>
			</p>
		</form>
		<script>
			function validateForm() {
				//validate username
				//if username is empty
				username = document.getElementById("username").value;
				if (username == "" || username.length < 4) {
					alert("Please enter your Username");
					document.getElementById("username").focus();
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