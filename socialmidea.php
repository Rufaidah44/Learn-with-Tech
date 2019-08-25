<?php 
//header("Content-type: text/html; charset=utf-8"); 
 session_start(); 

 $_SESSION['username'] = "";
  if (isset($_SESSION['userid'])) {
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
<title>محاضرة تطبيقات التواصل الإجتماعي  </title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php if (!isset($_SESSION['userid'])) { ?>
      <style type="text\css">
      #isusr{
        width:445;
			display: block !important;
			}</style>
      <?php }
      ?>
<style>
.btn {
    background-color: rgba(201, 102, 0,0.5);
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 30%;
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
    <h2 style="margin: 0px;">محاضرة تطبيقات التواصل الإجتماعي</h2>
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
		<a href="tchrlog.php" style="margin: 20 0 0 0;padding: 0;" class="isuser"><img src="images\tchrlog.png" width="30" height="30" title="صفحة الاستاذة"></>
		مرحباً<a id="user"  href="stdpersonal.php" style="padding: 7; margin: 15 0 0 30" onclick="ChangeHref()" > <?php echo $_SESSION['username'];?></a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction1()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?php if (!isset($_SESSION['userid'])) {
echo "<script>
$('.isuser').css('display', 'block');
</script>";

if($_SESSION['userid'] == 'Lalateeq'){
echo "<script>
$('#user').href('techpersonal.php');
</script>";}
}
?>
<br><br>

<center>
    

<h3> شبكات التواصل الإجتماعي نظري </h3>

<iframe src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=fvcs7e0qn&bgcolor=EEEEEE&t=1542617006" width="640" height="385" seamless="seamless" scrolling="no" frameBorder="0"         allowFullScreen="true"></iframe>


<div style="width:70%;text-align:center;"><br>
    <button class="btn" ><a href="lessons/شبكات التواصل الاجتماعي.pptx" download="شبكات التواصل عملي .pptx">تحميل PPT</a></button>
    <button class="btn" ><a href="lessons/شبكات التواصل الاجتماعي.pdf" download="شبكات التواصل عملي .pdf">تحميل PDF</a></button>
</div>

<hr width="70%">

<h3> شبكات التواصل الإجتماعي عملي </h3>


<iframe src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=fhi4kogbf&bgcolor=EEEEEE&t=1542617308" width="640" height="385" seamless="seamless" scrolling="no" frameBorder="0"         allowFullScreen="true"></iframe>




<div style="width:70%;text-align:center;"><br>
    <button class="btn" ><a href="lessons/شبكات التواصل عملي .pptx" download="شبكات التواصل عملي .pptx" >تحميل PPT</a></button>
    
<button class="btn" ><a href="lessons/شبكات التواصل عملي .pdf" download="شبكات التواصل عملي .pdf">تحميل PDF</a></button>
</div>


<script>

	function myFunction1() {
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
<hr width="70%" color=#463704 height="2%">
	<h4 > حقوق النشر محفوظة &copy; 2018</h4>
</center>
</footer> 
</body>
</html>