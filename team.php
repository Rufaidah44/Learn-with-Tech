<?php
session_start(); 
  $db = mysqli_connect('localhost', 'rufaidah_rufaida', '12345','rufaidah_futurelearn');
   $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($db,$sSQL) ;
 
  $sql2=" INSERT INTO teanwork (lmid, `lname`, `groupName`, `mem1`, `m1id`, `mem2`, `m2id`, `mem3`, `m3id`, `mem4`, `m4id`) 
          VALUES ( '".$_SESSION['userid']."','".$_SESSION['username']."','".$_POST['gn']."','".$_POST['gm2']."','".$_POST['gmi2']."','".$_POST['gm3']."','".$_POST['gmi3']."','".$_POST['gm4']."','".$_POST['gmi4']."','".$_POST['gm5']."','".$_POST['gmi5']."')";
       $result = mysqli_query($db, $sql2);
       if($result){
       echo"done";
       header('location:stdpersonal.php');}
       else 
      echo"error";
       
       ?>