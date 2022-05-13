<?php include('includes/server.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
    <div class="header">
        <h2> Trainer Attachment Registration</h2>
    </div>

    <form method="post" action="trainerregistration.php">
        <?php include('includes/errors.php'); ?>
        <div class="input-group">
            <label>Trainer Full Name</label>
            <input type="text" name="trainername" value="<?php echo $trainername; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="">
        </div>
        <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" value="">
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
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>

</html>