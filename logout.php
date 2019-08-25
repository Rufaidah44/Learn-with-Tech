<?php 
session_start(); 
session_destroy();
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
  	header("location: home1.php");
     
      ?>