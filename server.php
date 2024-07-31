<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$phno     = "";
$vhno     = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cwmsdb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['cusername']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phno= mysqli_real_escape_string($db, $_POST['phoneno']);
  $vhno= mysqli_real_escape_string($db, $_POST['vehicleno']);
  $addr= mysqli_real_escape_string($db, $_POST['address']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phno)) { array_push($errors, "Phono no. is required"); }
  if (empty($vhno)) { array_push($errors, "vehicle no. is required"); }
  if (empty($addr)) { array_push($errors, "address is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM testsign WHERE username='$username' OR phoneno='$phno' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }

    if ($user['phoneno'] === $phno) {
      array_push($errors, "Phone number already exists");
    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO testsign (username, email, phoneno, vehicleno, addr,password) 
  			  VALUES('$username','$email','$phno','$vhno','$addr','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['cusername'] = $username;
    $_SESSION['email'] = $email;
    // $_SESSION['phoneno'] = $phno;
  	$_SESSION['success'] = "You are now signed in";
    $p=$_SESSION['success'];
    echo "$p $username $email"; 
  	 header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) 
{
  
  // $_SESSION['ulogin']=$_POST['cusername'];
  $username = mysqli_real_escape_string($db, $_POST['cusername']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  // if no errors proceed
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['cusername']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM testsign WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['cusername'] = $username;
        // $_SESSION['phoneno'] = $phno;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
      }else {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }

}
  ?>

