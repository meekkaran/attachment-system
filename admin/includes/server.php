<?php
session_start();

// initializing variables
$username = "";
$email    = "";

// connect to the database
$db = mysqli_connect('localhost', 'karan', 'Karanmeek@21', 'dbsupervise');

// variable declaration
$username = "";
$email    = "";

register();

// REGISTER USER
function register()
{
  // call these variables with the global keyword to make them available in function
  global $db, $username, $email;


  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //prevent cross-site scripting
  $username = htmlspecialchars($username);
  $email = htmlspecialchars($email);
  $password_1 = htmlspecialchars($password_1);
  $password_2 = htmlspecialchars($password_2);

  //make sure both passwords do match
  if ($_POST['password_1'] != $_POST['password_2']) {
    echo ('The two Passwords do not match!');
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $sql = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username already taken')</script>";
  } else
    // Finally, register user if there are no errors in the form
    $password = md5($password_1); //encrypt the password before saving in the database
  $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  $result2 = mysqli_query($db, $query);
  if ($result2) {
    echo "<script>alert('sccessfull')</script>";
  } else {
    echo "<script>alert('error')</script>";
  }
  // get id of the created user
  $logged_in_user_id = mysqli_insert_id($db); //returns generated id of most recent query

  $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
  $_SESSION['success']  = "You are now logged in";
  header('location:../adminlogin.php');
}

// return user array from their id
function getUserById($id)
{
  global $db;
  $query = "SELECT * FROM users WHERE id=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}
