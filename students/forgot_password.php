<?php include "./includes/db.php";
session_start();
//user can change password
if (isset($_POST['change-password'])) {

    $admissionnumber = trim($_POST['admissionnumber']);/* removing whitespaces  */
    $admissionnumber = mysqli_real_escape_string($conn, $admissionnumber);/* escaping special chars from sql injection */

    $password = $_POST['password'];/* new password */
    $repassword = $_POST['repassword'];/* repeat password */
    $cpassword = $_POST['cpassword'];

    $password = md5($password);
    $cpassword = $_POST['cpassword'];
    $cpassword = md5($cpassword);

    $stmt = "SELECT * FROM students WHERE admissionnumber='$admissionnumber' and password='$password' "; #check for a user with the same username and password 
    $result = mysqli_query($conn, $stmt);/* execute the query */
    $rows = mysqli_num_rows($result);/* count the number of arrays returened by the query */
    if ($rows != 1) #if current credentials are wrong 
    {
        echo "<script>alert('Invalid Admission Number or password')</script>";/* inform user to  change their credentials */
        header('location: studentlogin.php');/* redirect back to the login */
        die;/* stop executing the script */
    } else if ($password == $repassword) {/* if the password and the repeat password are the same */
        #$sql = "UPDATE  students  SET password='$password' WHERE admissionnumber='$admissionnumber' ";/* update the password */
        $sql = "UPDATE  students  SET password='$password' WHERE admissionnumber='$admissionnumber' ";
        $query = mysqli_query($conn, $sql);
        echo "<script>alert('Successfully updated password please login.')</script>";
        header('location: studentlogin.php');
    } else {
        echo "<script>alert('Password and Repeat Password dont match try again')</script>";
        header('location: forgot_password.php');
    } //end of else
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

    <form method="post" action="login.php" onSubmit="return validateForm()">
        <div class="inputform">
            <label>Admission Number</label>
            <input type="text" id="admissionnumber" name="admissionnumber">
        </div>
        <div class="inputform">
            <label>Old Password</label>
            <input type="password" id="cpassword" name="cpassword">
        </div>
        <div class="inputform">
            <label>New Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="inputform">
            <label>Repeat New password</label>
            <input type="password" id="repassword" name="repassword">
        </div>
        <div class="inputform">
            <button type="submit" class="btn" name="change-password">Reset Your Password</button>
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