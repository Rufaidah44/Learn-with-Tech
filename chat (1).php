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
<title>محادثة</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="chat/styles.css" type="text/css" rel="stylesheet">
	<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(1000,function(i){
			j.ajax({
			  url: "chat/refresh.php",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			
			  }
			})
		})
		
	});	
	var objDiv = document.getElementById("rsfresh");
	objDiv.scrollTop = objDiv.scrollHeight;
//window.scrollTo(0,document.querySelector(".refresh").scrollHeight);
	
	j(document).ready(function() {
			j('#post_button').click(function() {
				$text = $('#post_text').val();
				j.ajax({
					type: "POST",
					cache: false,
					url: "chat/save.php",
					data: "text="+$text,
					success: function(data) {
						alert('data has been stored to database');
					}
				});
			});
		});
   j('.refresh').css({color:"green"});
});

</script>

<style>

</style>
</head>

<body style="background-color:#ffcf0a" >
<div  style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;">تحدثي معنا </h2>
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
}
if($_SESSION['userid'] == 'Lalateeq'){
echo "<script>
$('#user').prop('href', 'techpersonal.php');
</script>";
}
?>
<br>
<?php if(isset($_POST['submit1']))
{
$con = mysqli_connect('localhost', 'rufaidah_rufaida', '12345','rufaidah_futurelearn');
   $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($con,$sSQL) ;
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
        date_default_timezone_set("Asia/Riyadh");
        $msgid = date("Y-m-d H:i:sa");
		$message=$_POST['message'];
		$senderid=$_SESSION['userid'];
		$sendername = $_SESSION['username'];
		$query = "INSERT INTO chat(mdgid, senderid , sendername, msg, msgdate)VALUES('$msgid','$senderid' ,'$sendername', '$message', '$msgid')";
    	$result  = $con->query($query);

}
?>
<center>
<form method="POST"  action="">
<div class="refresh" id="refresh">

<?php if($_SESSION['userid']){
$con = mysqli_connect('localhost', 'rufaidah_rufaida', '12345','rufaidah_futurelearn');
   $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($con,$sSQL) ;
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$query = "SELECT * FROM chat ORDER BY msgdate ";
	$result   = $con->query($query);

while ($row = $result->fetch_array())
  {
      if($row['senderid'] == $_SESSION['userid']){
  echo '<p class="mssgme" style=" background-color:'.$_SESSION["usercolor"].'">'.'<span>'.$row["sendername"].'</span><br>'. '&nbsp;&nbsp;'. $row["msg"].'</span><br><span style="font-size:9; margin-left:80%;"><br>'.$row["msgdate"].'</span></p>';
  }
  else echo '<p class="mssg" >'.'<span>'.$row["sendername"].'</span><br>'. '&nbsp;&nbsp;'. $row["msg"].'</span><br><span style="font-size:9; margin-left:80%;"><br>'.$row["msgdate"].'</span></p>';
  }
 
 echo' </div>
<input name="message" type="text" id="textb"/>
<input name="submit1" type="submit" value="ارسال" id="post_button" />
</form>';
echo "<script> var objDiv = document.getElementById('refresh');
	objDiv.scrollTop = objDiv.scrollHeight;</script>";
  }
else echo"<h2> Please Log in First...... </h2>";
  ?>


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

