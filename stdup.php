<?php
 header("Content-type: text/html; charset=utf-8"); 
session_start();

// initializing variables
$userid = "" ;
$username = "";
$email    = "";
$usrtwtr = "";
$usrinsta = "";
$errors = array(); 

// connect to the database

$db = mysqli_connect('localhost', 'rufaidah_rufaida', '12345','rufaidah_futurelearn');
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($db,$sSQL) ;
// REGISTER USER
if (isset($_POST['sup'])) {
  
  // receive all input values from the form
  $userid = mysqli_real_escape_string($db, $_POST['uniid']);
  $username = mysqli_real_escape_string($db, $_POST['usrnm']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['psw']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM members WHERE mid='$userid' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $row = mysqli_fetch_assoc($result);
  
  if ($row) { // if user exists
    if ($row['mid'] === $userid) {
      array_push($errors, "Username already exists");
    }
  }
  
  
  $userpicar = array('st2.png','st3.jpg','st4.png','st5.png','st5.png','st6.png');
   $usercolorar = array('#ffe699','#ffff99','#e6ff99','#ccffff','#ffccff','#d9ccff');
   
////////////////////////////////////
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['usrnm']);
  $userid = mysqli_real_escape_string($db, $_POST['uniid']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['psw']);
  $usrtwtr =  mysqli_real_escape_string($db, $_POST['twtr']);
  $usrinsta = mysqli_real_escape_string($db, $_POST['instg']);
  $userpic = $userpicar[rand(0,5)];
  $usercolor = $usercolorar[rand(0,5)];
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  
  // Finally, register user if there are no errors in the form
  //if (count($errors) == 0) {
  //	$password = md5($password_1);//encrypt the password before saving in the database
  
    $sSQL= 'SET CHARACTER SET utf8';
  	$query = "INSERT INTO members (mid, mname, memail, mpass, mtwtr, minsta,mcolor,mimage) 
  			  VALUES('$userid','$username', '$email', '$password', '$usrtwtr', '$usrinsta','$usercolor','$userpic')";

  if(mysqli_query($db, $query)){
  	$_SESSION['userid'] = $userid;
  	$_SESSION['username']=$username;
    $_SESSION['userpic']=$userpic;
    $_SESSION['usercolor']=$usercolor;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: stdpersonal.php');
  }
      else echo"faild";

}
?>