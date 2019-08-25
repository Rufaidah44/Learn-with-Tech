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
<title>تقيم الطالبات و الاختبارات </title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php if (isset($_SESSION['userid'])) { ?>
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
	width:75%;
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
    border-top: none;
	width:75%;
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
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  
  
    top: 30%;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>

<body style="background-color:#ffcf0a">
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;">صفحة المعلمة</h2>
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
?>
	<br><br><br>
	<center>
	<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'evalu')" id="defaultOpen">تقييم الطالبات</button>
  
  
</div>

<div id="exam" class="tabcontent">
 <br>
 ll
<?php	
$sql2 = "select * from exam" ;

  $result = mysqli_query($db, $sql6);
  $user = mysqli_fetch_assoc($result);
  
  //if ($user) { // if user exists
if ($result->num_rows > 0){ 
         // output data of each row 
         while($record = $result->fetch_assoc()) { 
		      echo "<tr>";
              echo "<td> <input type=text name=firstname required value='". $record['Fname']."'> </td>";
              echo "<td>  <input type=text name=lastname required value='". $record['Lname']."'> </td>";
              echo "<td>  <input type=email name=email required value='". $record['Phone']."'> </td>";
              echo "<td>  <input type=text name=phone required value='". $record['Email']."'> </td>";
              echo "<td>  <input type=number name=age required value='". $record['Age']."'> </td>";
              echo "<td>  ul<input type=date name=birthday_date required value='". $record['Adate']."'> </td>";
              echo "<td>  <input type=number name=weight required value='". $record['Weigt']."'> </td>";
              echo "<td>  <input type=number name=length required value='". $record['Height']."'> </td>";
              echo "<td>  <input type=text name=blood_type required value='". $record['BloodType']."'> </td>";
              echo "<td>  <input type=numbertext name=BMI required value='". $record['BMI']."'> </td>";
              echo "</tr></table>";  
         }} /*وقفت هنا اسوي اري احفظ فيها الايدي حقت البنات او احفظ الادي في النيم عشان لما تضغط لى الاسم ينتقل لصفحة التقييم 
         و معاه الايدي
		 اسو يصفحة للتاكد من هوية المعلمة و بعدها ينقلني هنا
		      */     
              ?>
		    
</div>

<div id="evalu" class="tabcontent" dir="rtl">
  <h2>ملفات تم رفعها من قبل الطالبات</h2>
  <?php
  
  $sql2 = "select * from tasks t left join members m on t.mid = m.mid " ;
  $result = mysqli_query($db, $sql2);
  if ($result) {
     while($record = mysqli_fetch_assoc($result)) { 
		      echo "<table style='width:80%; border: 1px solid gray'><tr >";
              echo "<td style='width:20%'> <lable>اسم المجموعة: ".$record['teamname']."</lable></td>";
              echo "<td style='width:20%'> <lable>موضوع المف: ".$record['title']."</lable></td>";
              echo "<td style='width:20%'>  <lable> قامت برفع الملف:".$record['mname']."</lable> </td>";
              echo "<td style='width:20%'><a href='".$record['file']."' download> تحميل المرفق</a></td>";
                echo "<td style='width:20%'><button name='".$record['tid']."' onclick='block(".$record['tid'].")' style='width:auto;'>تقييم</button></td>";
              echo "</tr></table>";  
         }  }  
  ?>
  
  
</div>
<div id="id01" class="modal">
   
  <form class="modal-content animate"  method="post" enctype="multipart/form-data">
   <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
   <div class="container">
      <label for="uname"><b>رفع ملف التقييم</b></label>
      <input type="file" name="repfile"><br>
      <input type="text" id="tidd" name="tidd" style="display:none">
      <label for="psw"><b>ملاحظات على المرفق</b></label><br>
      <textarea name="comm" style="width:70%; height:150" required></textarea>
      <button type="submit" style="width:30%" name="evaluation"
      value="إضافة تقييم">
                    اضافة تقييم</button>
    </div>

      
    </div>
  </form>
</div>
<?php

if(isset($_POST['evaluation'])){
  
    $file= $_FILES['repfile'];
    $file_name = $_FILES['repfile']['name'];
    $file_size = $_FILES['repfile']['size'];
    $file_tmp = $_FILES['repfile']['tmp_name'];
    $file_type = $_FILES['repfile']['type'];
    $file_error = $_FILES['repfile']['error'];
    
    if($file_error === 0)
    { 
        if($file_size < 100000000000)
        {
            
           $filedestination = "tasks/repl/".$file_name;
           move_uploaded_file($file_tmp, $filedestination );
           
    $sql = "UPDATE `tasks` SET `tch_repl`='".$_POST['comm']."',`tch_img`='$filedestination', `tch_time`='".date('y-m-d h:i:sa')."'  WHERE tid =".$_POST['tidd'];
     $result = mysqli_query($db, $sql);
           if($result){
           echo"<script>alert('تمت الإضافة')</script>";
        }}
        else{ echo"file too big";}
    }
    else {echo"error in uploading file";}
}
    
    

?>
	<form action="logout.php"><button class="tablinks" type="submit" name="logout" style="width:30%"> تسجيل الخروج</button></form>
		<script>
		var x ;
		function block(name){
		    document.getElementById('id01').style.display='block';
		   x = name ;
		    document.getElementById("tidd").value = x;
		}
		
	function myFunction1() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {S
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
	<footer>
	<center>
<hr width="70%" color="#da2321" >
	<h4 > حقوق النشر محفوظة &copy; 2018</h4>
</center>
</footer> 
</html>