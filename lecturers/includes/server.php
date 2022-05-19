<?php
session_start();

// initializing variables
$role_id = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'dbsupervise');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $lecname = mysqli_real_escape_string($db, $_POST['lecname']);
    $role_id = mysqli_real_escape_string($db, $_POST['role_id']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //prevent cross-site scripting
    $lecname = htmlspecialchars($lecname);
    $role_id = htmlspecialchars($role_id);
    $email = htmlspecialchars($email);
    $phonenumber = htmlspecialchars($phonenumber);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($lecname)) {
        array_push($errors, "Full Name is required");
    }
    if (empty($role_id)) {
        array_push($errors, "RoleID is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phonenumber)) {
        array_push($errors, "phonenumber is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM lecturers WHERE role_id='$role_id' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['role_id'] === $role_id) {
            array_push($errors, "role_id already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO lecturers (lecname,role_id, email, phonenumber, password,created_at) 
  			  VALUES('$lecname','$role_id', '$email','$phonenumber', '$password', now())";
        mysqli_query($db, $query);
        $_SESSION['role_id'] = $role_id;
        $_SESSION['success'] = "You are now logged in";
        header('location: assigned.php');
    }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $role_id = mysqli_real_escape_string($db, $_POST['role_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($role_id)) {
        array_push($errors, "role_id is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM lecturers WHERE role_id='$role_id' AND password='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($results);
        // session_destroy();
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['role_id'] = $role_id;
            $_SESSION['lecturer_id'] = $lecturer_id;
            $_SESSION['lecturer_id'] = $user['lecturer_id'];
            $_SESSION['success'] = "You are now logged in";
            header('location: assigned.php');
        } else {
            array_push($errors, "Wrong role_id/password combination");
        }
    }
}
