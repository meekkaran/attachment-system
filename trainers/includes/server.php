<?php
session_start();

// connect to database
$db = mysqli_connect("localhost", "karan", "Karanmeek@21", "dbsupervise");

// variable declaration
$email    = "";

if (isset($_POST['register_btn'])) {
    register();
}

// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $email;

    // receive all input values from the form. 
    //Call the mysqli_real_escape_string defined below to escape form values
    $trainername  =  mysqli_real_escape_string($db, $_POST['trainername']);
    $email       =  mysqli_real_escape_string($db, $_POST['email']);
    $mobile    =  mysqli_real_escape_string($db, $_POST['mobile']);
    $title   =  mysqli_real_escape_string($db, $_POST['title']);
    $password_1  =  mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2  =  mysqli_real_escape_string($db, $_POST['password_2']);


    //prevent cross-site scripting
    $trainername = htmlspecialchars($trainername);
    $email = htmlspecialchars($email);
    $mobile = htmlspecialchars($mobile);
    $title = htmlspecialchars($title);
    $password_1 = htmlspecialchars($password_1);
    $password_2 = htmlspecialchars($password_2);

    // first check the database to make sure a user does not already exist with the  email
    $user_check_query = "SELECT * FROM trainers WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user  != "") { // if user exists
        if ($user['email'] === $email) {
            echo "<script>alert('Email already exists');window.location='../trainerregistration.php'</script>";
        }
    }
    //make sure both passwords do match
    elseif ($password_1 !== $password_2) {
        echo "<script>alert('The two Passwords do not match!');window.location='../trainerregistration.php'</script>";
    } else {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO trainers (trainername,email, mobile, title, password ,created_at) 
					  VALUES('$trainername', '$email', '$mobile',  '$title', '$password',now())";
        $result2 = mysqli_query($db, $query);
        if ($result2) {
            echo "<script>alert('sccessfull')</script>";
            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db); //returns generated id of most recent query

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location:../trainerlogin.php');
        } else {
            echo "<script>alert('error')</script>";
            header('location:../trainerregistration.php');
        }
    }
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
