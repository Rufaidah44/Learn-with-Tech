<?php
include 'mysql.php';
$sql = 'DELETE FROM comments WHERE c_id='.$_GET['id'].' LIMIT 1';
$result = mysqli_query($conn,$sql);
$sql2 = 'UPDATE posts SET p_num_comments=p_num_comments-1 WHERE p_id='.$_GET['post'].' LIMIT 1';
$result = mysqli_query($conn,$sql2);
redirect('post_view.php?id='.$_GET['post']);
?>