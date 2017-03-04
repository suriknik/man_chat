<?php session_start();

if(isset($_SESSION['Id'])){
    include("../functions/baza.php"); 
    
   $id=$_SESSION['Id'];
   $query=mysql_query("SELECT * FROM user WHERE Id = '$id'");
   $user_data = mysql_fetch_array($query);
		
	$name=$user_data['name'];
    $family=$user_data['family'];
    $c=$user_data['code'];

   $azs = mysql_query("SELECT * FROM avatars WHERE id = '$id'");
   $azaza = mysql_fetch_array($azs);
   
   $_SESSION['avatar'] = $azaza['url'];

echo "<span class = 'regname'> $name  $family </span> 

<li class='divider-vertical'></li>

";

	if (isset($_GET['naw'])){
	$naw = trim($_GET['naw']);
    }
    else $naw = '';
 
    switch($naw){
        case 'out': 
        session_destroy();
     	echo("<script>location.href='../../index.php'</script>");
        echo $page;
        break;	
	}
    
}




?>
<!DOCTYPE html>

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
	<link rel="stylesheet" href="../../style/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../../style/icomoon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../../style/owl.carousel.min.css">
	<link rel="stylesheet" href="../../style/owl.theme.default.min.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../../style/magnific-popup.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="../../style/style.css">
	<!-- Modernizr JS -->
	<script src="../../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

 </head>
 <body>

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
						<li><a href="letters.php"><span>Письма <span class="border"></span></span></a></li>
						<li><a href="chat.php"><span>Чат() <span class="border"></span></span></a></li>
						<li><a href="report.php"><span>Объявления() <span class="border"></span></span></a></li>
						<li><a href="tpl/.php"><span>Друзья <span class="border"></span></span></a></li>
					    <li><a href="../../tpl/news.php"><span>Новости() <span class="border"></span></span></a></li>
			
					    <li><span class = "my_class"><p><a href = "index.php?naw=out">Выйти</a></p></span></li>
					   
					</ul>
				</div>
			</div>
		</nav>
	</header>


<br />
<center><h3>Изменить аватарку</h3>
<br />
<img src = "<?php echo "../".$_SESSION['avatar']; ?> "  style = "width:30%;"/>

<form action="#" method="post" enctype="multipart/form-data">
    <br />
   <input type = "file" name = "uploadfile" />
<br />
<?php
 if(isset($_SESSION['avatar'])){
   echo" <button type= 'submit' name = 'butup'  class='btn btn-success'>Заменить фотографию</button>";
 }
 else{
   echo" <button type= 'submit' name = 'butup' class='btn btn-success'>Добавить фотографию</button>";
 }
?>
</form>
  
  <br />
  <br />
  <br />
  
 <h3>Изменить информацию о себе</h3>
 <br />
 
<?php

echo " <center><div style = 'width: 50%;'><form method = 'POST' action = '#'><h4>Ваша дата рождения:</h4> <br /> <input type = 'date' class='form-control' name = 'date'><br /><h4> Ваши любимые кружки (введите через запятую): </h4> <input type = 'text' name = 'kry' class='form-control'> <br /> <h4> Город: </h4>  <input type = 'text' name = 'city' class='form-control'><br /> <h4> Ваш номер телефона: </h4> <input type = 'tel' name = 'telnum'  pattern='8[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}' class='form-control'> <br /> <h4> Выберите пол: </h4> Женский: <input type = 'radio' name = 'sex' value = '1'> <br /> Мужской: <input type = 'radio' name = 'sex' value = '2'> <br /><br /> <input type = 'submit' value = 'Изменить' name = 'inf' class='btn btn-primary'> </form>  </center>";


   if(isset($_POST['inf'])){
    if(!empty($_POST['sex'])){
         $sex = $_POST['sex'];   
        mysql_query("UPDATE user SET sex = '".$sex."' WHERE Id = '$id'");
    }
    if(!empty($_POST['date'])){
         $date = $_POST['date'];
        mysql_query("UPDATE user SET birthday = '".$date."' WHERE Id = '$id'");
    }
     if(!empty($_POST['telnum'])){
         $telnum = $_POST['telnum'];
        mysql_query("UPDATE user SET tel = '".$telnum."' WHERE Id = '$id'");
    }
    if(!empty($_POST['city'])){
         $city = $_POST['city'];
        mysql_query("UPDATE user SET city = '".$city."' WHERE Id = '$id'");
    }
    if(!empty($_POST['kry'])){
         $circles = $_POST['kry'];
        mysql_query("UPDATE user SET circles = '".$circles."' WHERE Id = '$id'");
    }
    $_SESSION['infa'] = 1;
   }
?>

<br />
<br />


<h3>Изменить настройки приватности:</h3>
<form method = "POST" action = "">
    <b>Дата рождения:</b> да<input type = 'radio' name = 'a' value = '1'> нет<input type = 'radio' name = 'a' value = '2'><br />
    <b>Кружки:</b> да<input type = 'radio' name = 'b' value = '1'> нет<input type = 'radio' name = 'b' value = '2'><br />
    <b>Город:</b> да<input type = 'radio' name = 'c' value = '1'> нет<input type = 'radio' name = 'c' value = '2'><br />
    <b>Номер телефона:</b> да<input type = 'radio' name = 'd' value = '1'> нет<input type = 'radio' name = 'd' value = '2'><br /><br />
    <input type = 'submit' name = 'sub'>
</form>


<?php
if ( isset( $_POST['sub'] ) ){
    if($_POST['a'] == 1){
        mysql_query("UPDATE user SET birthday_bool = '1' WHERE Id = '$id'");
    }
    else if($_POST['a'] == 2){
        mysql_query("UPDATE user SET birthday_bool = '2' WHERE Id = '$id'");
    }
    if($_POST['b'] == 1){
        mysql_query("UPDATE user SET circles_bool = '1' WHERE Id = '$id'");
    }
        else if($_POST['b'] == 2){
        mysql_query("UPDATE user SET circles_bool = '2' WHERE Id = '$id'");
    }
    if($_POST['c'] == 1){
        mysql_query("UPDATE user SET city_bool = '1' WHERE Id = '$id'");
    }
        else if($_POST['c'] == 2){
        mysql_query("UPDATE user SET city_bool = '2' WHERE Id = '$id'");
    }
    if($_POST['d'] == 1){
        mysql_query("UPDATE user SET tel_bool = '1' WHERE Id = '$id'");
    }
        else if($_POST['d'] == 2){
        mysql_query("UPDATE user SET tel_bool = '2' WHERE Id = '$id'");
    }
}
?>


</center>
<br />
<br />
<br />

<?php
if(isset($_POST['butup'])){
 if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        $asdfg = "../avatars/".$id."_ava_". strtolower($_FILES['uploadfile']['name']);
        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $asdfg);
        $str = "avatars/".$id."_ava_". strtolower($_FILES['uploadfile']['name']);
        $avatars = $azaza['url'];
        unlink($avatars);
        mysql_query(" UPDATE avatars SET url = '".$str."' WHERE id= '".$id."' ");
        unset($_POST);
        unset($_FILES);
        $_SESSION['avatar']=$str;
        echo("<script>location.href='settings.php'</script>");
 }
}
?>
 </body>
</html>