<?php
session_start();

// initializing variables
$admissionnumber = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'dbsupervise');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $admissionnumber = mysqli_real_escape_string($db, $_POST['admissionnumber']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
    $companyname = mysqli_real_escape_string($db, $_POST['companyname']);
    $companycontact = mysqli_real_escape_string($db, $_POST['companycontact']);
    $companyaddress = mysqli_real_escape_string($db, $_POST['companyaddress']);
    $companyemail = mysqli_real_escape_string($db, $_POST['companyemail']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //prevent cross-site scripting
    $fullname = htmlspecialchars($fullname);
    $admissionnumber = htmlspecialchars($admissionnumber);
    $email = htmlspecialchars($email);
    $phonenumber = htmlspecialchars($phonenumber);
    $companyname = htmlspecialchars($companyname);
    $companyaddress = htmlspecialchars($companyaddress);
    $companyemail = htmlspecialchars($companyemail);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($fullname)) {
        array_push($errors, "Full Name is required");
    }
    if (empty($admissionnumber)) {
        array_push($errors, "Admission Number is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phonenumber)) {
        array_push($errors, "phonenumber is required");
    }
    if (empty($companyname)) {
        array_push($errors, "companyname is required");
    }
    if (empty($companycontact)) {
        array_push($errors, "companycontact is required");
    }
    if (empty($companyaddress)) {
        array_push($errors, "companyaddress is required");
    }
    if (empty($companyemail)) {
        array_push($errors, "companyemail is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM students WHERE admission_number='$admissionnumber' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['admission_number'] === $admissionnumber) {
            array_push($errors, "admission_number already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO students (fullname,admission_number, email, phone_number,company_name, company_Contact, company_address,company_email, password,created_at) 
  			  VALUES('$fullname','$admissionnumber', '$email','$phonenumber','$companyname','$companycontact','$companyaddress','$companyemail', '$password',now())";
        mysqli_query($db, $query);
        $_SESSION['admissionnumber'] = $admissionnumber;
        $_SESSION['success'] = "You are now logged in";
        header('location: logbook.php');
    }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $admissionnumber = mysqli_real_escape_string($db, $_POST['admissionnumber']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($admissionnumber)) {
        array_push($errors, "admissionnumber is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM students WHERE admission_number='$admissionnumber' AND password='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['admissionnumber'] = $admissionnumber;
            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['success'] = "You are now logged in";
            header('location: logbook.php');
        } else {
            array_push($errors, "Wrong admissionnumber/password combination");
        }
    }
}
