<?php
header("location: stdpersonal.php"); // Redirecting To Other Page
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (empty($_POST['uniid']) || empty($_POST['psw'])) {
$error = "Username or Password is invalid";
//echo $error;
}
else
{
// Define $username and $password
//echo "Hellow2";
//echo $_POST['uniid'];
$_SESSION['userid'] = $_POST['uniid'] ;
//echo "Hellow2";
$username=$_POST['uniid'];
$password=$_POST['psw'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$connection = mysql_connect("localhost", "rufaidah_rufaida", "12345");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("rufaidah_futurelearn", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from members where mpass='$password' AND mid='$username'", $connection);
$rows = mysql_num_rows($query);

if ($rows > 0) {
$_SESSION['username']=$username; // Initializing Session
//echo "Hellow3";
 $_SESSION['userpic']=$row['mimage'];
 $_SESSION['usercolor']=$row['mcolor'];

} else {
$error = "Username or Password is invalid";
echo $error;
//echo "Hellow4";
}
mysql_close($connection); // Closing Connection
}
//header("location: stdpersonal.php"); // Redirecting To Other Page
?>
