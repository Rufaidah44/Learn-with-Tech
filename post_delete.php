<?php
include 'mysql.php';

$sql = 'DELETE FROM posts WHERE p_id='.$_GET['id'].' LIMIT 1';
	$result = mysqli_query($conn,$sql);
	
$sql2 = 'DELETE FROM comments WHERE post_id='.$_GET['id'] ;
$result = mysqli_query($conn,$sql2);

redirect('blog.php');