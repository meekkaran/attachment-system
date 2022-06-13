<!DOCTYPE html>
<html>

<head>
	<title>StudentLogin</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="heading">
		<h2>Student Login</h2>
	</div>

	<form method="post" id="studentlogin" action="login.php" onSubmit="return validateForm()">

		<div class="inputform">
			<label>Admission Number</label>
			<input type="text" name="admissionnumber" id="admissionnumber">
		</div>
		<div class="inputform">
			<label>Password</label>
			<input type="password" name="password" id="password">
		</div>
		<div class="inputform">
			<button type="submit" class="btn" id="login_btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="studentregistration.php">Sign up</a><br>
			<a href="../index.php">HOME PAGE</a>
		</p>
		<div style="font-size: 0.8emm;">
			<a href="forgot_password.php">Forgot Your Password?</a>
		</div>
	</form>
	<script>
		function validateForm() {
			//validate admission number
			admissionnumber = document.getElementById("admissionnumber").value;
			if (admissionnumber == "" || isNaN(admissionnumber) || admissionnumber.length < 5) {
				alert("please enter valid admission number");
				document.getElementById("admissionnumber").focus();
				return false;
			}
			//validating password
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