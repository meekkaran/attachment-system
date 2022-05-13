<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
    <div class="header">
        <h2>Trainer Login</h2>
    </div>

    <form method="post" action="trainerlogin.php">
        <?php include('includes/errors.php'); ?>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <hr>
        <p>
            Not yet a member? <a href="trainerregistration.php">Sign up</a><br>
            <a href="../index.php">HOME PAGE</a>
            <!-- Go to home page <a href="/index.php">Sign up</a> -->
        </p>
    </form>
</body>

</html>