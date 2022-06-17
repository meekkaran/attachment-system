<?php include('../includes/db.php');
if (isset($_POST['submit'])) {
    $lecname = $_POST['lecname'];
    $role_id = $_POST['role_id'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $department = $_POST['department'];
    $password_1  =  $_POST['password_1'];
    $password_2  = $_POST['password_2'];


    // register user if there are no errors in the form
    $password = md5($password_1);
    $sql = "INSERT into `lecturers` (lecname,role_id, email, phonenumber, department, password, created_at)
    values('$lecname','$role_id','$email','$phonenumber', '$department','$password', now())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Successfully added a lecturer";
        // header("Location: ../registeredsupervisors.php");
    } else {
        echo "Error,check whether you have entered details correctly";
    }
}
?>

<html>

<head>

    <title>addLecturer</title>
    <link rel="stylesheet" href="../templates/admin1.css" />
    <link rel="stylesheet" type="text/css" href="../templates/style.css">
</head>

<body>


    <div class="heading">
        <h2> Add A Lecturer</h2>
    </div>

    <form method="post" action="addlecturer.php" onSubmit="return validateForm()">
        <div class="inputform">
            <label>Fullname</label>
            <input type="text" id="lecname" name="lecname" value="">
        </div>
        <div class="inputform">
            <label>Role ID</label>
            <input type="text" id="role_id" name="role_id" value="">
        </div>
        <div class="inputform">
            <label>Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="inputform">
            <label>Phone Number</label>
            <input type="text" id="phonenumber" name="phonenumber" value="">
        </div>
        <div class="inputform">
            <label for="department">Department:</label>
            <select id="department" name="department">
                <option value="Mathematics and Actuarial Science">Mathematics and Actuarial Science</option>
                <option value="Computer and Information Science">Computer and Information Science</option>
                <option value="Community Health and Development">Community Health and Development</option>
                <option value="Natural Sciences">Natural Sciences</option>
                <option value="Nursing">Nursing</option>
            </select>
        </div>
        <div class="inputform">
            <label>Password</label>
            <input type="password" id="password_1" name="password_1">
        </div>
        <div class="inputform">
            <label>Confirm password</label>
            <input type="password" id="password_2" name="password_2">
        </div>
        <div class="inputform">
            <button type="submit" class="btn" name="submit">Submit</button>
            <button type="submit" class="btn" name="submit"><a href="../registeredsupervisors.php">BACK</a></button>
        </div>
    </form>
    <script>
        function validateForm() {
            //if fullname is empty
            lecname = document.getElementById("lecname").value;
            if (lecname == "" || lecname.length < 4) {
                alert("Please enter your full name");
                document.getElementById("lecname").focus();
                return false;
            }
            //validate roleID
            //if role ID is empty
            role_id = document.getElementById("role_id").value;
            if (role_id == "" || role_id.length < 4) {
                alert("Please enter your Role ID");
                document.getElementById("role_id").focus();
                return false;
            }
            //validate email
            email = document.getElementById("email").value;
            if (email.length == 0 || email.indexOf("@") == -1 || email.indexOf(".") == -1) {
                alert("You must enter a valid email");
                document.getElementById("email").focus();
                return false;
            }
            //if phonenumber is empty
            phonenumber = document.getElementById("phonenumber").value;
            if (phonenumber == "" || isNaN(phonenumber) || phonenumber.length < 8) {
                alert("please enter valid phone number");
                document.getElementById("phonenumber").focus();
                return false;
            }
            //if department is empty
            department = document.getElementById("department").value;
            if (department == "") {
                alert("please enter department");
                ddocument.getElementById("department").focus();
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
        }
    </script>


</body>



</html>