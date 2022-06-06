<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>LecRegistration</title>
    <link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
    <div class="header">
        <h2>Lecturer Registration</h2>
    </div>

    <form method="post" action="lecturerregistration.php">
        <?php include('includes/errors.php'); ?>
        <div class="input-group">
            <label>Fullname</label>
            <input type="text" name="lecname" value="">
        </div>
        <div class="input-group">
            <label>Role ID</label>
            <input type="text" name="role_id" value="">
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
            Already a member? <a href="lecturerlogin.php">Sign in</a>
        </p>
    </form>
</body>

</html>