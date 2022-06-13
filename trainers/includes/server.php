<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

// variable declaration
$email    = "";
$errors   = array();

register();
// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $trainername  =  e($_POST['trainername']);
    $email       =  e($_POST['email']);
    $mobile    =  e($_POST['mobile']);
    $title   =  e($_POST['title']);
    $password_1  =  e($_POST['password_1']);


    //prevent cross-site scripting
    $trainername = htmlspecialchars($trainername);
    $email = htmlspecialchars($email);
    $mobile = htmlspecialchars($mobile);
    $title = htmlspecialchars($title);


    // register user if there are no errors in the form

    $password = md5($password_1); //encrypt the password before saving in the database
    $query = "INSERT INTO trainers (trainername,email, mobile, title, password ,created_at) 
					  VALUES('$trainername', '$email', '$mobile',  '$title', '$password',now())";
    if (mysqli_query($db, $query)) {
        echo "<script>alert('sccessfull')</script>";
    } else {
        echo "<script>alert('error')</script>";
    }

    // get id of the created user
    $logged_in_user_id = mysqli_insert_id($db);

    $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
    $_SESSION['success']  = "You are now logged in";
    header('location: ../trainerlogin.php');
}

// return user array from their id
function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM trainers WHERE trainer_id=" . $id;
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


