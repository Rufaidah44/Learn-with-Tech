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
	<title>صفحة الطالبة </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
<style>
* {box-sizing: border-box}
body {}

/* Style the tab */
.tab {
    float: left;
   border: 1px solid rgba(201, 102, 0,0.5);
    background-color: rgba(240, 102, 0,0.5);
    width: 18%;
    height: 450px;
	text-align: right;
}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding:10px 8px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color:#8C5B00;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: rgba(204, 102, 0,0.9);
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid rgba(204, 102, 0,0.9) ;
    width: 82%;
    height: 450px;
}
</style>
</head>

<body style="background-color:#ffcf0a">
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;">صفحة الطالبة </h2>
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

  
   $sql = "select * from members where mid='".$_SESSION['userid']."'";

  $result = mysqli_query($db, $sql);
  $user = mysqli_fetch_assoc($result);
  //$user['mname']
  $twtrlink="https://twitter.com/".$user['mtwtr'];
  $instalink = "https://www.instagram.com/".$user['minsta'];

  ?>
<center >
	<div style="width:80%">
<div id="pinfo" class="tabcontent" dir="rtl" >
  <br><br>
  <table style="width:60%"><tr><td style="width:50%">
  <lable style="font-size:20;margin:10px;">اسم الطالبة </lable> :</td>
  <td style="width:50%"><lable style="font-size:20"> <?php echo $user['mname'] ?> </lable></td></tr>
  <br>
<tr><td>
  <lable style="font-size:20">الرقم الجامعي </lable> :</td>
  <td><lable style="font-size:20"> <?php echo $user['mid'] ?> </lable><br></td>
</tr>
<tr><td>
  <lable style="font-size:20">البريد الالكتروني </lable>:</td>
  <td><lable style="font-size:20"><?php echo $user['memail'] ?></lable><br><br>
</td></tr>
<tr><td>
  <a href="<?php echo $twtrlink; ?>"><img src="images\twtricon.png" width="50" height="50"> </a></td>
 <td> <a href="<?php echo $instalink; ?>"><img src="images\instaicon.png" width="50" height="50"> </a></td></tr></table>
  <br><br><br><br>
 
</div>

<div id="group" class="tabcontent">
  <h3>مجموعة العمل الحالية </h3>
  <?php 
  $sql1="SELECT * FROM teanwork WHERE lmid='".$_SESSION['userid']."' OR m1id='".$_SESSION['userid']."' OR m2id='".$_SESSION['userid']."' OR m3id='".$_SESSION['userid']."' OR m4id='".$_SESSION['userid']."'";
  $result = mysqli_query($db, $sql1);
  $team = mysqli_fetch_assoc($result);
    if ($team) { 
       echo' <lable style=font-size:20;margin:10px;">اسم المجموعة  </lable> :
  <lable style="font-size:20">'.$team['groupName'].'</lable><br>

  <lable style="font-size:20">أعضاء المجموعة </lable><br>
  <lable style="font-size:20"> القائدة: '.$team['lname'].'</lable><br>:
  <lable style="font-size:20">'.$team['mem1'].'</lable><br>
  <lable style="font-size:20">'.$team['mem2'].'</lable><br>
  <lable style="font-size:20">'.$team['mem3'].'</lable><br>
  <lable style="font-size:20">'.$team['mem4'].'</lable><br><br>';
  
  }
       else{
           echo"<h4>اضافة مجموعة جديدة</h4>";
           echo'<form accept-charset="utf-8" action="team.php"  method="POST" style="margin:2;text-align: center">
  <center style="padding:0 0 0 0%;">
  <div class="input-container" dir="rtl">
    <input class="input-field" type="text" placeholder="اسم المجموعة" name="gn" required >
  </div><br>
	  <div class="input-container">
    <input class="input-field" type="text" placeholder="اسم العضو 1" name="gm2" required >
    <input class="input-field" type="text" placeholder="الرقم الجامعي" name="gmi2" required>
  </div> <br>
	  <div class="input-container">
    <input class="input-field" type="text" placeholder="اسم العضو 1" name="gm3" required>
    <input class="input-field" type="text" placeholder="الرقم الجامعي" name="gmi3" required>
  </div><br>
  <div class="input-container">
    <input class="input-field" type="text" placeholder="اسم العضو 3" name="gm4" required >
    <input class="input-field" type="text" placeholder="الرقم الجامعي" name="gmi4" required>
  </div><br>
  <div class="input-container">
    <input class="input-field" type="text" placeholder="اسم العضو 4" name="gm5" required>
    <input class="input-field" type="text" placeholder="الرقم الجامعي" name="gmi5" required>
  </div><br>
  <input type="submit" name="addgrp" value="إضافة">
        </form>   ';
       }
  ?>
</div>

<div id="req" class="tabcontent">
    <center>
  <h2> الرجاء رفع الملف لتقييمه</h2><br>
<form id="upload" action="fileupload.php" method="POST" enctype="multipart/form-data" dir="rtl">
            <div class="input-container">
                <input style="width:60% ; padding:1%" type="text" name="teamename" required placeholder="اسم المجموعة كما هم مسجل">   <br><br>
                <input style="width:60% ; padding:1%" type="text" name="title" required placeholder="عنوان المتطلب">   <br><br>
            <lable class="input-field" >الرجاء تسمية الملف باسم المجوعة + عنوان الملف قبل رفعه </lable><br><br>
          <lable >اختيار الملف</lable>  <input  class="input-field" type="file" name="file"><br><br>
            <textarea  style="width:60% ; padding:1%" name="des" placeholder="وصف الملف المرفق"></textarea><br><br>
            <input type="submit" value="رفع" name="upload">
            </div>
        </form>
</center>
</div>

<div id="info" class="tabcontent" dir="rtl">

 <?php
  
  $sql2 = "select * from tasks where mid ='".$_SESSION['userid']."'" ;
  $result = mysqli_query($db, $sql2);
  if ($result) {
     while($record = mysqli_fetch_assoc($result)) { 
		      echo "<table style='width:80%'><tr >";
              echo "<td style='width:20%'> <lable>عنوان المتطلب: ".$record['title']."</lable></td>";
              if($record['tch_repl']){
              echo "<td style='width:20%'>  <lable> ملاحظات المعلمة :".$record['tch_repl']."</lable> </td>";
              echo "<td style='width:20%'><a href='".$record['tch_img']."' download> تحميل المرفق</a></td>";}
              else{
                  
                    echo "<td style='width:20%'>لم يتم التقييم بعد</td>";}
              
               
              echo "</tr></table>";  
         }  }  
         else echo"لا توجد ملفات تم تقييمها"
  ?>
  
</div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'pinfo')" id="defaultOpen"><img src="images\pinfo.png" width="100%" height="80"></button>
  <button class="tablinks" onclick="openCity(event, 'group')"><img src="images\workg.png" width="100%" height="80"></button>
  <button class="tablinks" onclick="openCity(event, 'req')"><img src="images\stdev.png" width="100%" height="80"></button>
  <button class="tablinks" onclick="openCity(event, 'info')"><img src="images\infoev.png" width="100%" height="80"></button>
  <form action="logout.php"><button class="tablinks" type="submit" name="logout"> تسجيل الخروج</button></form>
</div></div>
	
	
	</center>
	
<script>
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
	
	
	
<footer>
	<center>
<hr width="70%" color="#da2321" >
	<h4 > حقوق النشر محفوظة &copy; 2018</h4>
</center>
</footer> 
</html>