<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

// variable declaration
$role_id = "";
$email    = "";
$errors   = array();


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
    $department =mysqli_real_escape_string($db, $_POST['department']);
    $password_1  = mysqli_real_escape_string($db, $_POST['password_1']);

    //prevent cross-site scripting
    $lecname = htmlspecialchars($lecname);
    $role_id = htmlspecialchars($role_id);
    $email = htmlspecialchars($email);
    $phonenumber = htmlspecialchars($phonenumber);
    $department = htmlspecialchars($department);


    // register user if there are no errors in the form
    $password = md5($password_1); //encrypt the password before saving in the database
    $query = "INSERT INTO lecturers (lecname,role_id, email, phonenumber, department, password ,created_at) 
					  VALUES('$lecname', '$role_id', '$email', '$phonenumber', '$department', '$password',now())";
    if (mysqli_query($db, $query)) {
        echo "<script>alert('sccessfull')</script>";
    } else {
        echo "<script>alert('error')</script>";
    }

    // get id of the created user
    $logged_in_user_id = mysqli_insert_id($db);

    $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
    $_SESSION['success']  = "You are now logged in";
    header('location: ../lecturerlogin.php');
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




