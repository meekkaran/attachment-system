<?php
session_start();

// connect to database
$db = mysqli_connect("localhost", "karan", "Karanmeek@21", "dbsupervise");

// LOGIN USER
login();
// LOGIN USER
function login()
{
    global $db, $email;

    // receive all input values from the form. 
    //Call the mysqli_real_escape_string defined below to escape form values
    $email =  mysqli_real_escape_string($db, $_POST['email']);
    $password      =  mysqli_real_escape_string($db, $_POST['password']);

    //prevent cross-site scripting
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    $password = md5($password);

    $query = "SELECT * FROM trainers WHERE email='$email' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
        // check if user is admin or user
        $logged_in_user = mysqli_fetch_assoc($results);

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        $_SESSION['utype'] = "trainer";

        //insert into trainer logs
        $trainer_id = $_SESSION['user']['trainer_id'];
        $date = date('Y-m-d H:i:s');
        $stmt3 = "INSERT INTO trainerlogs(trainer_id,action,time) VALUES('$trainer_id','Login','$date')";
        $query = mysqli_query($db, $stmt3);

        header('location: assignedtrainer.php');
    } else {
        echo "<script> alert('Wrong id/password combination'); window.location.href='trainerlogin.php';  </script>";
    }
}
