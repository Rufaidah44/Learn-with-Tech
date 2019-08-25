<?php

  
mysqli_connect('localhost','rufaidah_rufaida','12345');
mysqli_select_db(mysqli_connect('localhost','rufaidah_rufaida','12345'),'rufaidah_futurelearn');

$conn = new mysqli('localhost','rufaidah_rufaida','12345','rufaidah_futurelearn');

   $sSQL= 'SET CHARACTER SET utf8'; 
    mysqli_query($conn,$sSQL) ;
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
		
   
function mysql_safe_string($value) {
	$value = trim($value);
	if(empty($value))			return 'NULL';
	elseif(is_numeric($value))	return $value;
	else						return "'".mysqli_real_escape_string($GLOBALS['conn'],$value)."'";
}

function mysql_safe_query($query) {
	$args = array_slice(func_get_args(),1);
	$args = array_map('mysql_safe_string',$args);
	return mysqli_query(mysqli_connect('localhost','root',''),vsprintf($query,$args));
}

function redirect($uri) {
	header('location:'.$uri);
	exit;
}


?>