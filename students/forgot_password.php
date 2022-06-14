<?php include "./includes/db.php";
session_start();
//user can change password

if (isset($_POST['re_password'])) {
    $admissionnumber = $_POST['admissionnumber'];
    $old_pass = $_POST['old_pass'];
    $password = $_POST['password'];
    $re_pass = $_POST['re_pass'];

    $conn = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');
    $password_query = mysqli_query($conn, "SELECT * from students where admissionnumber= '$admissionnumber'");
    $password_row = mysqli_fetch_array($password_query);
    $database_password = $password_row['password'];
    if ($database_password == $old_pass) {
        if ($password == $re_pass) {
            $update_pwd = mysqli_query($conn, "UPDATE students set password='$password' where admissionnumber= '$admissionnumber'");
            echo "<script>alert('Update Sucessfully'); window.location='studentlogin'</script>";
        } else {
            echo "<script>alert('Your new and Retype Password is not match'); window.location='forgot_password.php'</script>";
        }
    } else {
        echo "<script>alert('Your old password is wrong'); window.location='forgot_password.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ForgotPasswordPage</title>
    <link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
    <div class="heading">
        <h2>Reset Your Password</h2>
    </div>

    <form method="post" action="" onSubmit="return validateForm()">
        <div class="inputform">
            <label>Admission Number</label>
            <input type="text" id="admissionnumber" name="admissionnumber">
        </div>
        <div class="inputform">
            <label>Old Password</label>
            <input type="password" id="old_pass" name="old_pass">
        </div>
        <div class="inputform">
            <label>New Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="inputform">
            <label>Repeat New password</label>
            <input type="password" id="re_pass" name="re_pass">
        </div>
        <div class="inputform">
            <button type="submit" class="btn" name="re_password">Reset Your Password</button>
        </div>
    </form>
</body>
<script>
    function validateForm() {
        //if admissionnumber is empty
        admissionnumber = document.getElementById("admissionnumber").value;
        if (admissionnumber == "" || isNaN(admissionnumber) || admissionnumber.length < 5) {
            alert("please enter valid admission number");
            document.getElementById("admissionnumber").focus();
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
        //validating password2
        password_2 = document.getElementById("password_2").value;
        if (password_2 == "" || password_2.length < 8) {
            alert("Password should not be empty and it should have more than 8 characters");
            document.getElementById("password_2").focus();
            return false;
        }
    }
</script>

</html>