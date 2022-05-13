<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="studentlogin.php">
		<?php include('includes/errors.php'); ?>
		<div class="input-group">
			<label>Admission Number</label>
			<input type="text" name="admissionnumber">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="studentregistration.php">Sign up</a><br>
			<a href="../index.php">HOME PAGE</a>
		</p>
	</form>
</body>

</html>