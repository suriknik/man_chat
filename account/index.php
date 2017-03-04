<?php session_start();

if(isset($_SESSION['Id'])){
    include("functions/baza.php"); 
    
   $id=$_SESSION['Id'];
   $query=mysql_query("SELECT * FROM user WHERE Id = '$id'");
   $user_data = mysql_fetch_array($query);
   
   $azs = mysql_query("SELECT * FROM avatars WHERE id = '$id'");
   $azaza = mysql_fetch_array($azs);
   
   $_SESSION['avatar'] = $azaza['url'];

	$name=$user_data['name'];
    $family=$user_data['family'];
    $c=$user_data['code'];
    
    
    $sex = $user_data['sex'];
    $date = $user_data['birthday'];
    $bool_date = $user_data['birthday_bool'];
    $kry = $user_data['circles'];
    $bool_kry = $user_data['circles_bool'];
    $city = $user_data['city'];
    $bool_city = $user_data['city_bool'];
    $tel = $user_data['tel'];
    $bool_tel = $user_data['tel_bool'];
    $color = $user_data['color'];


   if(!empty($date) || !empty($sex) || !empty($kry) || !empty($city) || !empty($tel)){
       $_SESSION['infa'] = 1;
   }
   
}
   
   	if (isset($_GET['naw'])){
	$naw = trim($_GET['naw']);
    }
    else $naw = '';
 
    switch($naw){
        case 'out': 
        session_destroy();
    	echo("<script>location.href='../index.php'</script>");
       
        echo $page;
        break;	
    	
	}
  
?>



<html>
 <head>
  <meta charset="utf-8">
  <title></title>
  

    <link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="style/button.css">
    	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Booster &mdash; A free HTML5 Template by FREEHTML5.CO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../style/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../style/icomoon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../style/owl.carousel.min.css">
	<link rel="stylesheet" href="../style/owl.theme.default.min.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../style/magnific-popup.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="../style/style.css">
	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <style>
        .my_class{
            color: white;
            font-size: 95%;
        }
        
    </style>
 </head>
 <body>
    
 <br />

	<header id="fh5co-header" role="banner">
		<nav class="navbar" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header"> 
				<!-- Mobile Toggle Menu Button -->
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
				<a class="navbar-brand" href="#">Man_chat</a>
				</div>
				<div id="fh5co-navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#"><span>Личный кабинет <span class="border"></span></span></a></li>
						<li><a href="tpl/letters.php"><span>Письма <span class="border"></span></span></a></li>
						<li><a href="tpl/chat.php"><span>Чат() <span class="border"></span></span></a></li>
						<li><a href="tpl/report.php"><span>Объявления() <span class="border"></span></span></a></li>
						<li><a href="tpl/.php"><span>Друзья <span class="border"></span></span></a></li>
					    <li><a href="../tpl/news.php"><span>Новости() <span class="border"></span></span></a></li>
			
					    <li><span class = "my_class"><p><a href = "index.php?naw=out">Выйти</a></p></span></li>
					   
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
<br />
<br />




<?php
if(isset($_SESSION['Id'])){
    echo"<center><font color = '".$color."'><h1>$name $family</h1></font></center>";
}
?>
<br />
<br />

    <center>
        <div style="width:500px; float:left;">
<?php
if (!empty($_SESSION['avatar'])){
    $str = $_SESSION['avatar']; 
    echo '<img src = "'.$str.'" width = "50%">';
}
else{
    echo "<img src = '1.jpg' width = '50%'/>";
}

?>
</div>

 
 

    <div style="margin-left:520px; text-align:right;">
    
        <center>
        <?
        if(!empty($_SESSION['infa'])){
            
           echo"<h3>Информация о тебе:</h3><p class = 'bg-success'><b>Дата рождения:</b>  ".$date;
           
           if($bool_date == 1){
               echo "(Не отображается другим пользователям)";
           }
           else{
               echo "(Отображается другим пользователям)";
           }
           
           echo "</p><p class = 'bg-success'><b>Любимые кружки:</b> ".$kry;
            
           if($bool_kry == 1){
               echo "(Не отображается другим пользователям)";
           }
           else{
               echo "(Отображается другим пользователям)";
           }
           
           echo "</p> <p class = 'bg-success'><b>Номер телефона: </b>".$tel;
           
           
           if($bool_tel == 1){
               echo "(Не отображается другим пользователям)";
           }
           else{
               echo "(Отображается другим пользователям)";
           }
           
           
           echo "</p><p class = 'bg-success'><b>Город: </b>".$city;
           
           
           if($bool_city == 1){
               echo "(Не отображается другим пользователям)";
           }
           else{
               echo "(Отображается другим пользователям)";
           }
           
           
           echo "</p>";
           
           if($c == 2){
               echo " <p class = 'bg-success'><b>Статус: </b> Учитель</p>";
           }
           elseif($c == 1){
               echo "<p class = 'bg-success'><b>Статус: </b> Ученик</p>";
           }
           else{
               echo "<p class = 'bg-success'><b>Статус: </b> Посетитель</p>";
           }
        }
        ?>
        
        <center>
    </div>


<br />
<center><h4><a href = "tpl/settings.php">Изменить настройки страницы</a></h4></center>

<br />
<br />

</body>
</html>
