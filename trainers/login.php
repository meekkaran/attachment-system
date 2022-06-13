<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'meek', 'dbsupervise');

// LOGIN USER
login();
// LOGIN USER
function login()
{
    global $db, $email, $errors;

    // grap form values
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);

    $query = "SELECT * FROM trainers WHERE email='$email' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        // check if user is admin or user
        $logged_in_user = mysqli_fetch_assoc($results);

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        $_SESSION['utype'] = "trainer";

        header('location: assignedtrainer.php');
    } else {
        array_push($errors, "Wrong emai/password combination");
    }
}
