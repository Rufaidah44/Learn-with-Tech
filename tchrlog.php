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
<title>صفحة أستاذة المقرر  </title>
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
	width:80%;
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
* {box-sizing: border-box}

/* Style the tab */
.tab2 {
    float: left;
     border: 1px solid rgba(201, 102, 0,0.5);
    background-color: rgba(240, 102, 0,0.5);
    width: 20%;
    height: 700px;
}

/* Style the buttons that are used to open the tab content */
.tab2 button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab2 button:hover {
   background-color:#8C5B00;
}

/* Create an active/current "tab button" class */
.tab2 button.active {
    background-color: rgba(204, 102, 0,0.5);
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid rgba(201, 102, 0,0.5);
    width: 80%;
    height: 700px;
}

.icon {
    padding: 10px;
    background: rgba(201, 102, 0,0.5);
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 80%;
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
.s26{
   font-size:26;
}
</style>
</head>

<body style="background-color:#ffcf0a">
<div style="text-align:right"> <img src="images\logo.png" alt="logo" width="300" height="70" class="logores">
  <center>
    <h2 style="margin: 0px;">صفحة استاذة المقرر</h2>
  </center>
</div> 
	<div class="topnav" id="myTopnav">
  <a href="home1.php" title="الرئيسية" style="margin: 0px 15px 0px 100px;margin-top: 0;" class="activea"><img src="images\books.png" width="110" height="70"></a>
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
<?php 
if (!isset($_SESSION['userid'])) {
echo "<script>
$('.isuser').css('display', 'block');
</script>";
}
if($_SESSION['userid'] == 'Lalateeq'){
echo "<script>
$('#user').href('techpersonal.php');
</script>";}

  session_start();
  if(isset($_POST['sup'])){
     if($_POST['usrid'] == 'Lalateeq' && $_POST['psw'] == '1q2w3e')
     {
         echo "<script> location.href='techpersonal.php'; </script>";
         $_SESSION['userid'] = 'Lalateeq';
         $_SESSION['username'] = "لطيفة العتيق"; }    
  else 
      echo "يوجد خطأ في معلومات الدخول";}
?>
	<br><br><br>	
	
	<center>
	    <div class="tab">
  <button class="tablinks" onclick="show()" >تواصل مع استاذة المقرر</button>
  <button class="tablinks" onclick="show2()">تسجيل دخول استاذة المقرر</button>
  
</div>
<div id="sign" style="display:none">
    <form action="" method="POST" style="max-width:500px;margin:2;text-align: center" >
  <center style="padding:0 0 0 8%;">
	  <br><br><br><br><br><br>
	  
	  <div class="input-container">
    <input class="input-field" type="text" placeholder="اسم المستخدم " name="usrid">
	  <i class="fa fa-user icon"></i>
  </div> 
  
  <div class="input-container">
      
    <input class="input-field" type="password" placeholder="كلمة المرور " name="psw"> <i class="fa fa-key icon"></i>
	 
  </div><br>
  <button type="submit" class="btn" name="sup">دخول</button></center>
</form>
</div>



<div id="content" dir="rtl" style="width:80%">


<div id="cv" class="tabcontent" >
    <div style="overflow: auto; height:inherit;">
  <h2>السيرة الذاية</h2>
 <hr width="80%">
<h3> لطيفة بنت خليل العتيق</h3>
<h4>المؤهلات العلمية:<br>
-ماجستير في تقنيات التعليم ، كلية التربية ، جامعة الملك سعود (٢٠١١).<br>
-بكالوريوس في الحاسب الآلي ، كلية التربية ، جامعة الملك سعود (٢٠٠٦) . <br>
<h3>التدريب و الخبرات العملية: </h3>
<h4>
-معيدة بالتعاون مع جامعة الملك سعود في كلية الدراسات التطبيقية و خدمة المجتمع ، قسم علوم الحاسب الآلي (٢٠٠٧) .<br>
-معيدة متعاقد مع جامعة الملك سعود في كلية الدراسات التطبيقية و خدمة المجتمع ، قسم علوم الحاسب الآلي (٢٠١٠) .<br>
-الإشراف على الإختبار الشامل في المؤسسة العامة لتعليم الفني و التدريب المهني (٢٠٠٨) . <br>
-متعاونة مع عمادة الجوده و التطوير في المعيار الحادي عشر من التقويم الذاتي المؤسسي (علاقة الجامعة بالمجتمع )  لعام (٢٠١٠) .<br>
- مشاركة في  اللجنة الإشرافية لتنظيم في الندوة الأولى لتطبيقات تقنية المعلومات و الاتصال في التعليم و التدريب .<br>
- مشرفة في منتديات تجمع طلاب جامعة الملك سعود (cksu)  منذ عام 2008م .<br>
-مُشاركة و مساهمة نشر و إعلان منافسة إثراء المحتوى العربي بالتعاون مع شركة (Google) و مدينة الملك عبدالعزيز للعلوم و التقنية و الجامعة.<br>
-حالياً معيدة في قسم تقنيات التعليم ، كلية التربية ، جامعة الملك سعود . <br>
</h4> 
<h3>أعمال تم إنجازها : </h3>
<h4>
- تصميم : <br>
*منهج إلكتروني (كنز المعرفة ) .  <br>
*برامج تعليمية متنوعة تهدف لدمج التقنية في التعليم بإستراتيجيات و أنماط متنوعة <br>
*مدونة تخدم تكنولوجيا التعليم . <br>
*مفكرة إلكترونية تفاعلية لإعداد خطة البحث العلمي كنشاط لتجمع طلاب الدراسات العليا الإلكتروني . <br>
*مجلات تخدم التعليم (في مرحلة التدريب) .  <br>
</h4>

<h3>-أوراق عمل :</h3>
<h4>
-مشاركة بورقة عمل ومقترحات  لإنشاء مركز مصادر تعلم افتراضي في (حلقة النقاش للقاء التخطيطي لإنشاء أول مركز وطني لمصادر التعلم ) و ذلك في مركز سلطان بن عبد العزيز للعلوم والتقنية (سايتك) .<br>
-مشاركة في اللقاء العلمي الأول لطلاب و طالبات جامعة الملك سعود .<br>
-مشاركة في اللقاء العلمي الثالث لطلاب و طالبات جامعة الملك سعود . <br>
-مشاركة في اللقاء العلمي الأول لطالبات الدراسات العليا كباحثات المستقبل . <br>
-مشاركة في تجربتي مع التقنية لنادي القيم في أسبوع التقنية . <br>
</h4>

<h3>ورش عمل و مؤتمرات :</h3>
<h4>
 -الندوة الأولى لتطبيقات تقنية المعلومات و الاتصال في التعليم و التدريب.<br>
-   ندوة قضايا المنهج  ، قسم اللغة العربية من جامعة الملك سعود .<br>
-ورشة عمل مجتمع المعرفة.<br>
-إصلاح التعليم في الدول العربية : المملكة العربية السعودية أنموذجاً.<br>
-مهارات التفكير الإبداعي .<br>
-طالبات الدراسات العليا (تأملات و شجون ) . <br>
-التقديم للجامعات العالمية . <br>
-محاضرة لنشر في المجلات العلمية التربوية (د.صوما بوجودة ) . <br>
-محاضرة استراتيجيات التعلم المبدع لـ ( ديان دودج ) . <br>
-الملتقى الأول لتدريس الجامعي (عمادة تطوير المهارات ) . <br>
-استخدام القاعات الذكية (عمادة التعليم الإلكتروني ) .<br>
</h4>

<h3> اللجان :   </h3>
<h4>
-مقررة في لجنة الدراسات العليا في القسم لفصلين متتاليين .<br>
-مقررة للجنة الأنشطة الطلابية .<br>
-مقررة في وحدة تقنية المعلومات .<br>
-مقررة في وحدة الخريجين . <br>
-عضوه في لجنة الجودة و التطوير . <br>
-عضوة في لجنة الإرشاد الطلابي . <br>
-عضوة في لجنة الجداول الدراسية . <br>
-عضوة في لجنة التطوير و التدريب . <br>
</h4>

</div>
</div>

<div id="plan" class="tabcontent" style="display:none">
  <h3>الخطة الدراسية</h3>
 
<iframe src="https://cdn.flipsnack.com/widget/v2/widget.html?hash=fzn3bl8fh&bgcolor=EEEEEE&t=1542617586" width="640" height="385" seamless="seamless" scrolling="no" frameBorder="0"         allowFullScreen="true"></iframe>
</div>

<div id="blog" class="tabcontent" style="display:none">
 <h3>جارِ تحويلك إلى الصفحة</h3>
</div>

<div id="cont" class="tabcontent" style="display:none" dir="rtl">
    <h2>للتواصل مع المعلمة</h2>
   <i class="fa fa-envelope" style="font-size:26"></i>&nbsp;&nbsp;<a href="mailto:Lalateeq@ksu.edu.sa" class="s26">Lalateeq@ksu.edu.sa</a><br>
   <i class="fa fa-envelope" style="font-size:26"></i>&nbsp;&nbsp;<a class="s26" href="mailto:Lalateeqksu@gmail.com">Lalateeqksu@gmail.com</a><br>
  <i class="fa fa-twitter-square" style="font-size:26"></i>&nbsp;&nbsp;<a class="s26" href="https://twitter.com/latifah_A_L">@latifah_A_L</a><br> 
  <a href="https://ask.fm/lato0ofa"><img src="images/askfm.png" width="40" height="40"></a>&nbsp;&nbsp;
   <a href="https://sayat.me/latifah"><img src="images/sayat.png" width="40" height="40"></a>&nbsp;&nbsp;
   <a href=" https://www.youtube.com/channel/UCHJu4u4ZGM0xsabkw9os94Q"><img src="images/youtube.png" width="40" height="40"></a>
 
</div>

  <div class="tab2">
  <button class="tablinks" onclick="openCity2(event, 'cv')"><img src="images\tccv.png" width="100%" height="80"></button>
  <button class="tablinks" onclick="openCity2(event, 'plan')"><img src="images\tcplane.png" width="100%" height="80"></button>
  <button class="tablinks" onclick="openCity2(event, 'blog')"><a href="http://fac.ksu.edu.sa/lalateeq" ><img src="images\tcblog.png" width="100%" height="80"></a></button>
  <button class="tablinks" onclick="openCity2(event, 'cont')"><img src="images\tccont.png" width="100%" height="80"></button>
</div>
</div>

<br><br><br>



<script>
	function myFunction1() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }}
    
    function show() {
   document.getElementById('content').style.display = "block";
   document.getElementById('sign').style.display = "none";
}
function show2() {
   document.getElementById('content').style.display = "none";
   document.getElementById('sign').style.display = "block";
}

function openCity2(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>	    
	    <footer>
	<center>
<hr width="70%" color="#da2321" >
	<h4 > حقوق النشر محفوظة &copy; 2018</h4>
</center>
</footer> 
</html>