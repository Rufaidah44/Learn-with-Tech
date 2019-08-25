<?php 
header("Content-type: text/html; charset=utf-8"); 
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
	
	include 'mysql.php';

$sql = "SELECT * FROM posts where p_id=".$_GET['id'];

 $result=mysqli_query($conn,$sql);
  
if(!mysqli_num_rows($result)) {
	echo 'Post not found';}
	else{
$_SESSION['posterid']="";
while ($row = mysqli_fetch_assoc($result)){
    $_SESSION['posterid'] = $row['adder_id'];
?>
<DOCTYPE html>
<html lang="ar">
<head>
<title><?php echo $row['p_title'];}}?></title>
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
hr{ color:black;}
</style>
	
</head>

<body style="background-color:#ffcf0a">
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;"></h2>
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

    echo "<script>
$('#poste').css('display', 'block');
</script>";
    echo "<script>
$('.postd').css('display', 'block');
</script>";


?>

<?php

$sql = "SELECT * FROM posts p INNER JOIN members m on m.mid=p.adder_id where p_id=".$_GET['id'];
 $result=mysqli_query($conn,$sql);
if(!mysqli_num_rows($result)) {
	echo 'Post not found';
}
else{

while ($row = mysqli_fetch_assoc($result)){
    ?><br><br>
    <center>
    <div style="width:85%;background-color:#d9ffcc;padding:2%;" dir="rtl" >
   <?php
   echo " <table style='width:100%'><tr><td style='width:10%'><img src='images/ic_palitra.png' width='50' height='50'></td>";
        echo '<td style="width:90%"><h3>'.$row["mname"].'</h3>';
        echo '<p></p></td></tr></table>';
        echo"<div style='border-top:1px solid gray;border-bottom:1px solid gray'><h2>".$row['p_title']."</h2>";
        echo $row['p_body'].'<br/><br>';
        
     echo '<div id="poste" style="display:none;text-align:right;"><a href="post_edit.php?id=' .$_GET['id'].'">تعديل</a> | <a href="post_delete.php?id='.$_GET['id'].'">حذف</a> | <a href="blog.php">صفحة المنتدى</a></div>';


}
if($_SESSION['userid'] == $_SESSION['posterid']){
echo "<script>
$('#poste').css('display', 'block');
</script>"; 
}}
echo '</div>';
$sql = 'SELECT * FROM comments WHERE post_id="'.$_GET['id'].'" ORDER BY date ASC';
$result=mysqli_query($conn,$sql);
if(!$result)
 {echo "<h3>لا توجد تعليقات</h3><br><br>";}
 else{
echo '<div style="width:70% padding:1%" dir="rtl">';
while($row = mysqli_fetch_assoc($result)) {
   echo"<table style='border-bottom:1px solid gray'><tr><td style='width:20%;padding:1%'><p style='font-size:12'>".$row['adder_name']."</p><p style='color:#d9ffcc'><br>".$row['date']."</p></td>";
    echo "<td style='width:80%;padding:1%'>".$row['content']."</td></tr></table>";
    if($row['adder_id'] === $_SESSION['userid']){
    echo '<a id="cdel" style="float:left;" href="comment_delete.php?id='.$row['c_id'].'&post='.$_GET['id'].'">Delete</a><br/>';}

}}
    
    if($_SESSION['userid']){
echo <<<HTML
<form method="post" action="comment_add.php?id={$_GET['id']}" style="width:70%">
		<label for="content">إضافة تعليق</label>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>
  
  <textarea name="content" style="width:70%; height:150;"></textarea><br />
  </td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn" type="submit" value="تعليق"/><br><br>
</form>
HTML;
}
else {
    echo <<<HTML
<form method="post" action="comment_add.php?id={$_GET['id']}" style="width:70%">
		<label for="content">إضافة تعليق</label>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>
  
  <textarea name="content" style="width:70%; height:150;">يجب تسجيل الدخول أولاَ لإضافة تعليق </textarea><br />
  </td>
		</tr>
</form>
HTML;

}
  
 ?>
</div>
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



