<?php 
//header("Content-type: text/html; charset=utf-8"); 
  //session_start(); 

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
<title>تسجيل الدخول للطالبات </title>
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
.tab {
    overflow: hidden;
    border: 1px solid rgba(201, 102, 0,0.5);
    background-color: rgba(240, 102, 0,0.5);
	width:60%;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
	width:50%;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color:#8C5B00;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: rgba(204, 102, 0,0.5);
}
@media screen and (max-width: 600px) {
    .tabcontent{	width:100%;
    padding:0;
    margin:0;
    
    }
    	.input-container {
    	    width: 100%;
    	    padding :0;
    	    margin: 0;
    	}
    
}
/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid rgba(204, 102, 0,0.5);
	background-image: url(images/loginbg.png);
	background-repeat: no-repeat;
	background-position: center;
    border-top: none;
	width:60%;
	height:500;
}
	.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 75%;
    margin-bottom: 15px;
		padding: 0px 0 0 10;
		text-align: center;
}

.icon {
    padding: 10px;
    background: rgba(201, 102, 0,0.5);
    color: white;
    min-width: 25px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
	text-align: center;
}

.input-field:focus {
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
    <h2 style="margin: 0px;">تسجيل الدخول للطالبات</h2>
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
<img src="images/snote.png" width="200" height="150">
	<center style="width:100%">
		
	<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'sign')" id="defaultOpen">تسجيل جديد</button>
  <button class="tablinks" onclick="openCity(event, 'log')">تسجيل الدخول</button>
  
</div>

<div id="sign" class="tabcontent">
 <br>
	<br><br>
  <form accept-charset="utf-8" action="stdup.php" method="POST" style="margin:2;text-align: center">
  <center style="padding:0 0 0 0%;">
  <div class="input-container">
    <input class="input-field" type="text" placeholder="اسم الطالبة" name="usrnm">
	  <i class="fa fa-user icon"></i>
  </div>

	  <div class="input-container">
    <input class="input-field" type="text" placeholder="الرقم الجامعي" name="uniid">
	  <i class="fa fa-envelope icon"></i>
  </div> 
	  
  <div class="input-container">
    <input class="input-field" type="text" placeholder="البريد الالكتروني" name="email">
	  <i class="fa fa-envelope icon"></i>
  </div>
  
  <div class="input-container">
    <input class="input-field" type="password" placeholder="كلمة المرور " name="psw">
	  <i class="fa fa-key icon"></i>
  </div>
	  
  <div class="input-container">
    <input class="input-field" type="text" placeholder="حساب تويتر " name="twtr">
	  <i class="fa fa-key icon"></i>
  </div>
	  <div class="input-container">
    <input class="input-field" type="text" placeholder="حساب انستقرام " name="instg">
	  <i class="fa fa-key icon"></i>
  </div>
  <button type="submit" class="btn" name="sup" visible="false">تسجيل</button>
  </center>
</form>

</div>

<div id="log" class="tabcontent">
  <form action="stdlog.php" method="POST" style="max-width:500px;margin:2;text-align: center">
  <center style="padding:0 0 0 8%;">
	  <br><br><br><br><br><br>
 	  <div class="input-container">
    <input class="input-field" type="text" placeholder="الرقم الجامعي" name="uniid">
	  <i class="fa fa-envelope icon"></i>
  </div> 
  
  <div class="input-container">
    <input class="input-field" type="password" placeholder="كلمة المرور " name="psw">
	  <i class="fa fa-key icon"></i>
  </div>
  <button type="submit" class="btn" style="visible:false">دخول</button>
  </center>
</form>
</div>

<script>
	function myFunction1() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }}
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</center>
<footer>
	<center>
<hr width="70%" color="#da2321" >
	<h4 > حقوق النشر محفوظة &copy; 2018</h4>
</center>
</footer> 
	</body>
</html>
