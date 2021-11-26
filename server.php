<?php

include "api.php";



// initializing variables
$username = "";
$email    = "";
$TPIN = "";
$customername = "";
$Business = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}

//adding the customer
if (isset($_POST['addcus'])) {
  $add = callAPI('POST', '/programming/challenge/webservice/Taxpayers/add', [
    "TPIN"=> $_POST['TPIN'],
 "BusinessCertificateNumber" => $_POST['BusinessCertificateNumber'],
 "TradingName" => $_POST['TradingName'],
 "BusinessRegistrationDate" => $_POST['BusinessRegistrationDate'],
 "MobileNumber" => $_POST['MobileNumber'],
 "Email" => $_POST['Email'],
 "PhysicalLocation" => $_POST['PhysicalLocation'],
 "Username" => $_POST['Username']
  ]);

  if($add['code'] === 200){
    $_SESSION['success'] = "Customer added successfully";
    header('location: index.php');
  }
  else{
    echo $add['response']['Remark'];
  }   
  exit(); 
  // receive all input values from the form
  $customername = mysqli_real_escape_string($db, $_POST['TPIN']);
  $Business = mysqli_real_escape_string($db, $_POST['Business']);
  $Phone = mysqli_real_escape_string($db, $_POST['Phone']);
  $TPIN = mysqli_real_escape_string($db, $_POST['TPIN']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($customername)) { array_push($errors, "Customer name is required"); }
  if (empty($Business)) { array_push($errors, "Business is required"); }
  if (empty($Phone)) { array_push($errors, "phone Number is required"); }
  //checking if the number is in our desired format
  $strphone=ltrim($Phone, '0');
              if (strlen($strphone)>9 || strlen($strphone)<9 ) 
              {
                 array_push($errors, "Phone Number is Invalid.");
                
              }
  $fieldofficer = $_SESSION['username'];
 
 

  // Finally, adding the customer if there are no errors in the form
  if (count($errors) == 0) {
    

    $query = "INSERT INTO customer (customername, business, TPIN, phone, fieldofficer) 
          VALUES('$customername', '$Business', '$TPIN', '$Phone', '$fieldofficer')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Customer added successfully";
    header('location: index.php');
  }
}

if (isset($_POST['editcus'])) {
  // receive all input values from the form
  $customerid = mysqli_real_escape_string($db, $_POST['customerid']);
  $customername = mysqli_real_escape_string($db, $_POST['customername']);
  $Business = mysqli_real_escape_string($db, $_POST['Business']);
  $Phone = mysqli_real_escape_string($db, $_POST['Phone']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($customername)) { array_push($errors, "Customer name is required"); }
  if (empty($Business)) { array_push($errors, "Business is required"); }
  if (empty($Phone)) { array_push($errors, "phone Number is required"); }
  //checking if the number is in our desired format
  $strphone=ltrim($Phone, '0');
              if (strlen($strphone)>9 || strlen($strphone)<9 ) 
              {
                 array_push($errors, "Phone Number is Invalid.");
                
              }
  $fieldofficer = $_SESSION['username'];
 
 

  // Finally, updating the customer if there are no errors in the form
  if (count($errors) == 0) {
    

    $query = "UPDATE customer set customername='$customername' , business='$Business' , phone='$Phone' where id='$customerid'";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Customer updated successfully";
    header('location: index.php');
  }
}

// ... 
if (isset($_POST['login_user'])) {
  $login = callAPI('POST', 'programming/challenge/webservice/auth/login', [
    'email' => 'cjiah38@gmail.com',
    'password' => 'password000122'
]);

if($login['code'] === 200){
  $_SESSION["name"] = $login['response']['Token']['Name'];
  $_SESSION["token"] = $login['response']['Token']['Value'];
}
else{
  echo $login['response']['Remark'];
} 
 


  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if (isset($_POST['Delete'])) {

  $customerid = mysqli_real_escape_string($db, $_POST['customerid']);
  $query = "DELETE from customer where id='$customerid'";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Customer deleted successfully";
    header('location: index.php');

}

if (isset($_POST['home'])) {

  
    header('location: index.php');

}

?>