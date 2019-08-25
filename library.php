<?php 
header("Content-type: text/html; charset=utf-8"); 
  session_start(); 

 $_SESSION['username'] = "";
 //$_SESSION['userid'] = null;
 
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
<title> المكتبة </title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="style.css" type="text/css" rel="stylesheet">
	
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
	width:70%;
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
.tab button:active {
    background-color: rgba(304, 102, 0,0.5);
}
* {box-sizing: border-box}

.dd{
    width:100%;
    height:500;
    overflow: auto;
    padding:1%;
}
    
</style>
</head>

<body style="background-color:#ffcf0a;	font-family: "Hacen Tunisia Lt" !important;">
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;"> المكتبة  </h2>
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
<div class="tab">
  <button class="tablinks" id="a22" onclick="show2()" >مكتبة الكتب المرئية </button>
  <button class="tablinks" id="a11" onclick="show()" > مكتبة الكتب المقروءة</button>
</div>

<div id="read" >
<img src="images/booklibrary.png" width="90%"> 

</div>

<div id="seen" dir="rtl" style="width:80%;display:none">
<table style="width:80%; border: 1px red solid " dir"rtl">
<tr><td style="width:20%">
  <button  onclick="show3()" ><img src="images/infog].png" width="100%" height="150"></button>
  <button  onclick="show4()"><img src="images/multim.png" width="100%" height="150"> </button>
  <button  onclick="show5()"><img src="images/socialm.png" width="100%" height="150"> </button>
  </td>
  
  
  <td style="width:80%" >
  <div id="d1" class="dd">
  <cener>
  <iframe width="95%" height="300" src="https://www.youtube.com/embed/9GYdwWs8jgw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <hr><iframe width="95%" height="300" src="https://www.youtube.com/embed/4jVdVw1J8bM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <hr>
  <iframe width="95%" height="300" src="https://www.youtube.com/embed/ZRcY9Yioe-8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

  </div>
  
  <div id="d2" class="dd" style="display:none">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/KfWjFLG34as" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <hr>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/P8QoLsaENN8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <hr>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/5wasfx76_kA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
  </div>
  
  <div id="d3" class="dd" style="display:none">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/j4qQdiRo50Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <hr>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/_TYR012yEJ8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <hr>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/5WkER0bupXw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
  </div>
  </td></tr></table>


<script>
function show() {
   document.getElementById('read').style.display = "block";
   document.getElementById('seen').style.display = "none";
   
}

function show2() {
   document.getElementById('read').style.display = "none";
   document.getElementById('seen').style.display = "block";
  
}

function show3() {
   document.getElementById('d1').style.display = "block";
   document.getElementById('d2').style.display = "none";
   document.getElementById('d3').style.display = "none";
}
function show4() {
   document.getElementById('d1').style.display = "none";
   document.getElementById('d2').style.display = "block";
   document.getElementById('d3').style.display = "none";
}
function show5() {
    document.getElementById('d1').style.display = "none";
   document.getElementById('d2').style.display = "none";
   document.getElementById('d3').style.display = "block";
}
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