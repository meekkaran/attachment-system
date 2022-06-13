<html>

<head>
	<title>TrainerRegistration</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="heading">
		<h2> Trainer Attachment Registration</h2>
	</div>

	<form method="post" id="trainerreg" action="./includes/server.php" onSubmit="return validateForm()">
		<div class="inputform">
			<label>Trainer Full Name</label>
			<input type="text" id="trainername" name="trainername" value="">
		</div>
		<div class="inputform">
			<label>Email</label>
			<input type="email" id="email" name="email" value="">
		</div>
		<div class="inputform">
			<label>Phone Number</label>
			<input type="text" id="mobile" name="mobile" value="">
		</div>
		<div class="inputform">
			<label>Title</label>
			<input type="text" id="title" name="title" value="">
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
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="trainerlogin.php">Sign in</a>
		</p>
	</form>
	<script>
		function validateForm() {
			//if fullname is empty
			trainername = document.getElementById("trainername").value;
			if (trainername == "" || trainername.length < 4) {
				alert("Please enter your full name");
				document.getElementById("trainername").focus();
				return false;
			}
			//validate email
			email = document.getElementById("email").value;
			if (email.length == 0 || email.indexOf("@") == -1 || email.indexOf(".") == -1) {
				alert("You must enter a valid email");
				document.getElementById("email").focus();
				return false;
			}
			//if phonenumber is empty
			mobile = document.getElementById("mobile").value;
			if (mobile == "" || isNaN(mobile) || mobile.length < 8) {
				alert("please enter valid phone number");
				document.getElementById("mobile").focus();
				return false;
			}
			//validate title
			title = document.getElementById("title").value;
			if (title == "") {
				alert("please enter title");
				ddocument.getElementById("title").focus();
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