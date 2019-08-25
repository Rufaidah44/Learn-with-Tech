<?php
include 'mysql.php';
session_start();
$sql = " INSERT INTO comments (`post_id`, `adder_id`, `adder_name`, `content`, `date`) VALUES (".$_GET['id'].",'".$_SESSION['userid']."','".$_SESSION['username']."','".$_POST['content']."','".date('Y-m-d h:i:sa')."')";

 $result=mysqli_query($conn,$sql);

$sql2 = "UPDATE posts SET p_num_comments = p_num_comments+1 WHERE p_id=".$_GET['id']." LIMIT 1";
$result=mysqli_query($conn,$sql2);

echo "<script> location.href='post_view.php?id=".$_GET['id']."'; </script>";
//redirect('post_view.php?id='.$_GET['id']);
?>