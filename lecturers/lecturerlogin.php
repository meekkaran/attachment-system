<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>LecLogin</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="header">
		<h2>Lecturer Login</h2>
	</div>

	<form method="post" action="lecturerlogin.php">
		<?php include('includes/errors.php'); ?>
		<div class="input-group">
			<label>Role ID</label>
			<input type="text" name="role_id">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="lecturerregistration.php">Sign up</a><br>
			<a href="../index.php">HOME PAGE</a>
		</p>
	</form>
</body>

</html>