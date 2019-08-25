<?php 
header("Content-type: text/html; charset=utf-8"); 
  session_start(); 

 $_SESSION['username'] = "";
  if (!is_null($_SESSION['userid'])) {
		// connect to the database
   $db = mysqli_connect('localhost', 'rufaidah_rufaida', '12345','rufaidah_futurelearn');
   $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($db,$sSQL) ;
	$sql = "select mname from members where mid='".$_SESSION['userid']."'";

  $result = mysqli_query($db, $sql);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    $_SESSION['username'] = $user['mname'];
              }
		else echo $_SESSION['userid'];
		//echo "oi".$_SESSION['username'];
	}
?>
<DOCTYPE html>
<html lang="ar">
<head>
<title>المنتدى </title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.postbg{
text-align:right;
background-image:url('images/bg4.png'); 
margin:2%;
padding:2%;
    }
</style>
</head>

<body style="background-color:#ffcf0a">
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;">المنتدى</h2>
   <br>
  </center>
</div> 
<div class="topnav" id="myTopnav">
  <a href="home1.php" style="margin: 0px 15px 0px 100px;margin-top: 0;" class="activea"><img src="images\books.png" width="110" height="70" title="الرئيسية"></a>
  <a href="chat.php" style="width:15%"><img src="images\chat.png" width="120" height="50"></a>
  <a href="blog.php" style="width:15%" ><img src="images\blog.png" width="120" height="50"></a>
  <a href="library.php" style="width:15%" ><img src="images\library.png" width="120" height="50"></a>
		<a href="stdntlog.php" style="margin: 20 0 0 100;padding: 0; display:none;" class="isuser" ><img src="images\grllog.png" width="30" height="30" title="صفحة الطالبة"></a>
		<a style="padding:15 0 0 0 ;display:none;" class="isuser">|</a>
		<a href="tchrlog.php" style="margin: 20 0 0 0;padding: 0;" class="isuser"><img src="images\tchrlog.png" width="30" height="30" title="صفحة المعلمة"></a>
		مرحباً<a id="user"  href="stdpersonal.php" style="padding: 7; margin: 15 0 0 30" onclick="ChangeHref()" > <?php echo $_SESSION['username'];?></a>
		
  <a href="javascript:void(0);" class="icon" onclick="myFunction1()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>
<?php if (!isset($_SESSION['userid'])) {
echo "<script>
$('.isuser').css('display', 'block');
</script>";
}
if($_SESSION['userid'] == 'Lalateeq'){
echo "<script>
$('#user').prop('href', 'techpersonal.php');
</script>";
}
?>
<center>
    
<div style="width:90%; border:1px solid #663300;padding:2%;">
<?php
include 'mysql.php';
if($_SESSION['userid']){
echo <<<HTML
<a href="post_add.php" style="float:left;font-size:20px;color:#663300">إضافة منشور +</a><br/>
HTML;

$sql="SELECT * FROM posts p INNER JOIN members m on m.mid=p.adder_id ";
if ($result=mysqli_query($conn,$sql)){
  if(!mysqli_num_rows($result)) {
	echo '<h3>لا توجد منشورات للعرض</h3>';
} else {
	while($row = mysqli_fetch_assoc($result)) {
		echo '<center><div class="postbg">
		    <table dir="rtl" style="width:100%"><tr><td style="width:15%;border-left:1px solid gray;"><img src="images/ic_palitra.png" width="50" height="50"><br><p>الكاتب :&nbsp;'.$row["mname"].'<b</td>';
		   echo'<td style="width:85%;padding-right:2%;"><h2>'.$row['p_title'].'</h2>';
		$body = substr($row['p_body'], 0, 100);
		echo nl2br($body).'...<br/>';
		echo '<a href="post_view.php?id='.$row['p_id'].'">قراءة المزيد</a> | ';
		echo $row['p_num_comments'].' تعليق';
   
	echo '</td></tr></table></div><hr color="red" width="90%" height="4"/>';
	}
}
}}
else echo" يجب تسجيل الدخول أولاً";

?></center>
</div>

<script> function myFunction1() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
} 
</script>
<footer>
	<center>
<hr width="70%" color="#da2321" >
	<h4 > حقوق النشر محفوظة &copy; 2018</h4>
</center>
</footer> 
</html>