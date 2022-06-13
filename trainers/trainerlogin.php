<html>

<head>
    <title>TrainerLogin</title>
    <link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
    <div class="heading">
        <h2>Trainer Login</h2>
    </div>

    <form method="post" id="trainlogin" action="login.php" onSubmit="return validateForm()">

        <div class="inputform">
            <label>Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="inputform">
            <label>Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="errorform" id="errors"></div>
        <div class="inputform">
            <button type="submit" class="btn" name="login_btn">Login</button>
        </div>
        <hr>
        <p>
            Not yet a member? <a href="trainerregistration.php">Sign up</a><br>
            <a href="../index.php">HOME PAGE</a>
            <!-- Go to home page <a href="/index.php">Sign up</a> -->
        </p>
    </form>
    <script>
        function validateForm() {
            //validate email
            email = document.getElementById("email").value;
            if (email.length == 0 || email.indexOf("@") == -1 || email.indexOf(".") == -1) {
                alert("You must enter a valid email");
                document.getElementById("email").focus();
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