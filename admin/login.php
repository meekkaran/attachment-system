<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');

login();
// LOGIN USER
function login()
{
    global $db, $username;
    // receive all input values from the form. Call the mysqli_real_escape_string() function
    // defined below to escape form values
    $username    = mysqli_real_escape_string($db, $_POST['username']);
    $password    = mysqli_real_escape_string($db, $_POST['password']);

    //prevent cross-site scripting
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $password = md5($password);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        $logged_in_user = mysqli_fetch_assoc($results);

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        $_SESSION['utype'] = "admin";

        header('location: dashboard.php');
    } else {
        echo "<script> alert('Wrong id/password combination'); window.location.href='lecturerlogin.php';  </script>";
    }
}
