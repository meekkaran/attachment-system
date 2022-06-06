<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

// variable declaration
$role_id = "";
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $role_id, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $lecname  =  e($_POST['lecname']);
    $role_id    =  e($_POST['role_id']);
    $email       =  e($_POST['email']);
    $phonenumber    =  e($_POST['phonenumber']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($lecname)) {
        array_push($errors, "Username is required");
    }
    if (empty($role_id)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phonenumber)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (strlen($_POST["password_1"]) < 8) 
    {
      array_push($errors,"Your Password Must Contain At Least 8 Characters!"); 
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO lecturers (lecname,role_id, email, phonenumber, password ,created_at) 
					  VALUES('$lecname', '$role_id', '$email', '$phonenumber', '$password',now())";
        mysqli_query($db, $query);

        // get id of the created user
        $logged_in_user_id = mysqli_insert_id($db);

        $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
        $_SESSION['success']  = "You are now logged in";
        header('location: assigned.php');
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

// escape string
function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}

// LOGIN USER
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

// LOGIN USER
function login()
{
    global $db, $role_id, $errors;

    // grap form values
    $role_id = $_POST['role_id'];
    $password = $_POST['password'];

    // make sure form is filled properly
    if (empty($role_id)) {
        array_push($errors, "role_id is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM lecturers WHERE role_id='$role_id' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);

            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";

            header('location: assigned.php');
        } else {
            array_push($errors, "Wrong role_id/password combination");
        }
    }
}
