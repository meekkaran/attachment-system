<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>StudentRegistration</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="header">
		<h2>Student Registration</h2>
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
			<label for="companyregion">Company Region:</label>
			<select name="companyregion">
				<option value="Central Region">Central Region</option>
				<option value="Coast Region">Coast Region</option>
				<option value="Eastern Region">Eastern Region</option>
				<option value="Nairobi Region">Nairobi Region</option>
				<option value="North Eastern Region">North Eastern Region</option>
				<option value="Nyanza Region">Nyanza Region</option>
				<option value="Rift Valley Region">Rift Valley Region</option>
				<option value="Western Region">Western Region</option>
			</select>
		</div>
		<div class="input-group">
			<label>Starting Date</label>
			<input type="date" name="startingdate" value="">
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
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="studentlogin.php">Sign in</a>
		</p>
	</form>
</body>

</html>