<?php
session_start();

// initializing variables
$trainername = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'dbsupervise');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $trainername = mysqli_real_escape_string($db, $_POST['trainername']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //prevent cross-site scripting
    $trainername = htmlspecialchars($trainername);
    $email = htmlspecialchars($email);
    $mobile = htmlspecialchars($mobile);
    $title = htmlspecialchars($title);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($trainername)) {
        array_push($errors, "Full name  is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($mobile)) {
        array_push($errors, "Mobile is required");
    }
    if (empty($title)) {
        array_push($errors, "Your title is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM trainers WHERE trainername='$trainername' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['trainername'] === $trainername) {
            array_push($errors, "Name for user already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO trainers(trainername, email, mobile,title, password, created_at) 
  			  VALUES('$trainername', '$email', '$mobile','$title', '$password', now())";
        mysqli_query($db, $query);
        $_SESSION['trainername'] = $trainername;
        $_SESSION['success'] = "You are now logged in";
        header('location: assignedtrainer.php');
    }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM trainers WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['trainername'] = $trainername;
            $_SESSION['trainer_id'] = $user['trainer_id'];
            // echo var_dump($_SESSION['trainer_id']);
            $_SESSION['success'] = "You are now logged in";
            header('location: assignedtrainer.php');
        } else {
            array_push($errors, "Wrong admissionnumber/password combination");
        }
    }
}
