<?php

$host    = "localhost";
$pass    = "12345";
$user    = "rufaidah_rufaida";
$db_name = "rufaidah_futurelearn";
$conn    = new mysqli($host, $user, $pass, $db_name);
$sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($conn,$sSQL) ;

?>