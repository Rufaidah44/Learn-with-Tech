<?php
$con = mysqli_connect('localhost', 'rufaidah_rufaida', '12345','rufaidah_futurelearn');
   $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($db,$sSQL) ;
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$query = "SELECT * FROM chat ORDER BY msgdate";
	$result   = $con->query($query);

while ($row = $result->fetch_array())
  {
  echo '<p>'.'<span>'.$row['sendername'].'</span>'. '&nbsp;&nbsp;' . $row['msg'].'</span>'.$row['msgdate'].'</p>';
  }


?>
