<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="studentregistration.php">
		<?php include('includes/errors.php'); ?>
		<div class="input-group">
			<label>Fullname</label>
			<input type="text" name="fullname" value="">
		</div>
		<div class="input-group">
			<label>Admission Number</label>
			<input type="text" name="admissionnumber" value="">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<label>Phone Number</label>
			<input type="text" name="phonenumber" value="">
		</div>
		<div class="input-group">
			<label>Company Name</label>
			<input type="text" name="companyname" value="">
		</div>
		<div class="input-group">
			<label>Company Contact</label>
			<input type="text" name="companycontact" value="">
		</div>
		<div class="input-group">
			<label>Company Address</label>
			<input type="text" name="companyaddress" value="">
		</div>
		<div class="input-group">
			<label>Company Email</label>
			<input type="text" name="companyemail" value="">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="studentlogin.php">Sign in</a>
		</p>
	</form>
</body>

</html>