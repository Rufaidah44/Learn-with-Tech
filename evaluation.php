<?php

if(isset($_POST['evaluation'])){
    session_start(); 
  $db = mysqli_connect('localhost', 'rufaidah_rufaida', '12345','rufaidah_futurelearn');
   $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($db,$sSQL) ;
  
    echo "21";
    $file= $_FILES['repfile'];
    $file_name = $_FILES['repfile']['name'];
    $file_size = $_FILES['repfile']['size'];
    $file_tmp = $_FILES['repfile']['tmp_name'];
    $file_type = $_FILES['repfile']['type'];
    $file_error = $_FILES['repfile']['error'];
    
    if($file_error === 0)
    { 
        if($file_size < 100000000000)
        {
            
           $filedestination = "tasks/repl/".$file_name;
           move_uploaded_file($file_tmp, $filedestination );
           
    $sql = "UPDATE `tasks` SET `tch_repl`='".$_POST['comm']."',`tch_img`='$filedestination', `tch_time`='".date('y-m-d h:i:sa')."'  WHERE tid =".$_POST['tidd'];
     $result = mysqli_query($db, $sql);
           if($result){
           echo"<script>alert('تمت الإضافة')</script>";
        }}
        else{ echo"file too big";}
    }
    else {echo"error in uploading file";}
}
    
    

?>