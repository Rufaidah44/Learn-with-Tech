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
<title>دمج التقنية في بيئة التعلم</title>
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

</head>

<body style="background-color:#ffcf0a;	font-family: "Hacen Tunisia Lt" !important;>
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;">بيئة تعلم مقرر <br>
      ”دمج التقنية في بيئة التعلم” </h2>
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
		<a href="tchrlog.php" style="margin: 20 0 0 0;padding: 0;" class="isuser"><img src="images\tchrlog.png" width="30" height="30" title="صفحة الاستاذة"></a>
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

<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fae">
    <div class="numbertext">1 / 3</div>
    <img src="images/adv11.png" style="width:100%">
    
  </div>

  <div class="mySlides fde">
    <div class="numbertext">2 / 3</div>
    <a href="library.php"><img src="images/adv22.png" style="width:100%"></a>
    
  </div>

  <div class="mySlides fde">
    <div class="numbertext">3 / 3</div>
    <img src="images/adv3.png" style="width:100%">
   
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<br><br>
<div class="container" style="width:80%;border:1px solid gray;padding:3%;" dir="rtl">
<center>
<p style="margin-top:-60px;background-color:#ffcf0a;width:30% "> المحاضرات</p>
</center>
<br>
  <div class="row" >
    <div class="col-sm-4">
     <a href="multimidea.php"><img src="images/lict3.png" width="90%" class="img-responsive"></a>
    </div>
    <div class="col-sm-4">
      <a href="socialmidea.php"><img src="images/lict2.png" width="90%" class="img-responsive"></a>
    </div>
    <div class="col-sm-4">
      <a href="infographic.php"><img src="images/lict1.png" width="90%" class="img-responsive"></a>
    </div>
  </div>
</div>


<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
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