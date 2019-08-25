<?php 
//header("Content-type: text/html; charset=utf-8"); 
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
<title>تعديل منشور </title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
input {
    width: 100%;
    padding: 10px;
    outline: none;
	text-align: center;
}

input:focus {
    border: 2px solid dodgerblue;
	
}

/* Set a style for the submit button */
.btn {
    background-color: rgba(201, 102, 0,0.5);
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 40%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
</style>
</head>

<body style="background-color:#ffcf0a">
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;">تعديل منشور جديد</h2>
   <br>
  </center>
</div> 
<div class="topnav" id="myTopnav">
  <a href="home1.php" style="margin: 0px 15px 0px 100px;margin-top: 0;" class="activea"><img src="images\books.png" width="110" height="70"></a>
  <a href="chat.php" style="width:15%"><img src="images\chat.png" width="120" height="50"></a>
  <a href="blog.php" style="width:15%" ><img src="images\blog.png" width="120" height="50"></a>
  <a href="library.php" style="width:15%" ><img src="images\library.png" width="120" height="50"></a>
		<a href="stdntlog.php" style="margin: 20 0 0 100;padding: 0; display:none;" class="isuser" ><img src="images\grllog.png" width="30" height="30"></a>
		<a style="padding:15 0 0 0 ;display:none;" class="isuser">|</a>
		<a href="tchrlog.php" style="margin: 20 0 0 0;padding: 0;" class="isuser"><img src="images\tchrlog.png" width="30" height="30"></a>
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

if(!empty($_POST)) {
	$sql2 = 'UPDATE posts SET p_title="'.$_POST['title'].'", p_body="'.$_POST['body'].'", p_date="'.time().'" WHERE p_id='.$_GET['id'];
	$result=mysqli_query($conn,$sql2);
	if($result)
	{
	    echo "<script> location.href='post_view.php?id=".$_GET['id']."'; </script>";}
	    //redirect('post_view.php?id='.$_GET['id']);
	else
		echo mysqli_error();
}

$sql = 'SELECT * FROM posts WHERE p_id='.$_GET['id'] ;
$result=mysqli_query($conn,$sql);

if(!mysqli_num_rows($result)) {
	echo 'Post #'.$_GET['id'].' not found';
	exit;
}

$row = mysqli_fetch_assoc($result);
echo <<<HTML
<form method="post" style="width:100%" dir="rtl">
	<table style="width:100%">
		<tr>
			<td><label for="title">الموضوع</label>&nbsp;&nbsp;</td>
			<td><input name="title" id="title" value="{$row['p_title']}" /></td>
		
		</tr>
		<tr><td><br></td></tr>
		<<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		<tr>
		    
			<td><label for="body">المحتوى</label></td>
			<td><div style="background-color:white"><textarea name="body" id="body" style="width:100%;height:300px;">{$row['p_body']}</textarea></div></td>
		</tr>
		<tr><td><br></td></tr>
		<tr>
			<td></td>
			<td><input type="submit" value="نشر" class="btn" /></td>
		</tr>
	</table>
</form>
HTML;

?>
</div>
</center>
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






