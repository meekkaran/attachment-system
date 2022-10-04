<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');

// variable declaration
$role_id = "";
$email    = "";

if (isset($_POST['register_btn'])) {
    register();
}


register();
// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $role_id, $email;

    // receive all input values from the form. Call the escape string
    // defined below to escape form values
    $lecname  = mysqli_real_escape_string($db, $_POST['lecname']);
    $role_id    = mysqli_real_escape_string($db, $_POST['role_id']);
    $email       = mysqli_real_escape_string($db, $_POST['email']);
    $phonenumber    = mysqli_real_escape_string($db, $_POST['phonenumber']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $password_1  = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2  = mysqli_real_escape_string($db, $_POST['password_2']);
    //prevent cross-site scripting
    $lecname = htmlspecialchars($lecname);
    $role_id = htmlspecialchars($role_id);
    $email = htmlspecialchars($email);
    $phonenumber = htmlspecialchars($phonenumber);
    $department = htmlspecialchars($department);
    $password_1  = htmlspecialchars($password_1);
    $password_2  = htmlspecialchars($password_2);


    // first check the database to make sure 
    // a user does not already exist with the same role_id and/or email
    $user_check_query = "SELECT * FROM lecturers WHERE role_id='$role_id' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user  != "") { // if user exists
        if ($user['role_id'] === $role_id) {
            echo "<script>alert('role_id already exists');window.location='../lecturerregistration.php'</script>";
        }

        if ($user['email'] === $email) {
            echo "<script>alert('Email already exists');window.location='../lecturerregistration.php'</script>";
        }
    }
    //make sure both passwords do match
    elseif ($password_1 !== $password_2) {
        echo "<script>alert('The two Passwords do not match!');window.location='../lecturerregistration.php'</script>";
    } else {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO lecturers (lecname,role_id, email, phonenumber, department, password ,created_at) 
					  VALUES('$lecname', '$role_id', '$email', '$phonenumber', '$department', '$password',now())";
        $result2 = mysqli_query($db, $query);
        if ($result2) {
            echo "<script>alert('sccessfull')</script>";
            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db); //returns generated id of most recent query

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location:../lecturerlogin.php');
        } else {
            echo "<script>alert('error')</script>";
            header('location:../lecturerregistration.php');
        }
    }
}
// return user array from their id
function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM lecturers WHERE lecturer_id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
