<?php 
    session_start();
    include("../account/functions/baza.php"); 
    $connection = mysql_connect("localhost","suriknik","aa08072003");
    $db = mysql_select_db("i9781008_mansur");
    include("../functions/codir.php"); 
?>
<!DOCTYPE html>
<html>
 <head>
   <title>Регистрация</title>
   <meta charset = "UTF-8">
    <script src="http://yandex.st/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>
       
   
    <script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="../js/spectrum.js"></script>
    
    
    
    	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	
	<link rel="stylesheet" href="../style/style.css">
	<!-- Modernizr JS -->

 </head>
 <body>
 	<header id="fh5co-header" role="banner">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header"> 
				<!-- Mobile Toggle Menu Button -->
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
				<a class="navbar-brand" href="#">Man_chat</a>
				</div>
				<div id="fh5co-navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../"><span>Главная <span class="border"></span></span></a></li>
						<li class = "active"><a href="#"><span>Войти/Зарегистрироваться <span class="border"></span></span></a></li>
						<li><a href="news.php"><span>Новости <span class="border"></span></span></a></li>
					
					</ul>
				</div>
			</div>
		</nav>
	</header>


        

<br />
<br />
<br />

<center>
<div style = "width:50%">
<h2>Войти</h2>
<br />
<center>
<form class="form-horizontal" method = "post" action = "indoor.php">
   
    
    <input type="text" class="form-control" id="inputLogin" placeholder="Введите логин" name="inter_login" required>
        <br />
        <br />
    <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль" name="inter_password" required>
        <br />
        <br />
    
	<button class = "btn btn-success" type = "inter" name = "inter">Войти</button>
   
</form>

<br />


 <?php
 if(isset($_POST['inter'])){
	$inter_login=$_POST['inter_login']; 
	$inter_password=md5($_POST['inter_password']);
	
	
	$query=mysql_query("SELECT * FROM user WHERE login = '$inter_login'");
	$user_data = mysql_fetch_array($query);
	
	if($user_data['password']==$inter_password){
		$_SESSION['Id']=$user_data['Id'];
	   echo("<script>location.href='../account'</script>");
	}
	
	else{
		echo ' <div class="alert alert-error">
                   Не правильный логин или пароль
               </div>';
		
	}
 }

  $result = mysql_query(" SELECT * FROM user ");
  mysql_close();
  
  
?>

</div>

<br />
<br />


<h2>Зарегистрироваться</h2>
<br />
<div style = "width:50%">
<form class="form-horizontal" method = "post" action = "indoor.php">

<input type="text" class="form-control" id="inputName" placeholder="Ваше имя" name = "name" required>  
        <br />
        <br />
<input type="text" class="form-control" id="inputFamily" placeholder="Ваша фамилия" name = "family" required>  
        <br />
        <br />		
    <input type="text" class="form-control" id="inputLogin" placeholder="Ваш логин" name="login"  minlength="5" maxlength="12" required>
        <br />
        <br />
    <input type="password" class="form-control" id="inputPassword" placeholder="Придумайте свой пароль" name="password"  minlength="8" maxlength="15" required>
        <br />
        <br />
    <input type="password" class="form-control" id="retPassword" placeholder="Повторите пароль" name="retpass" required>
        <br />
        <br />
    <input type="password" class="form-control" id="code" placeholder="Пригласительный код (спрашивать у руководителя кружка или администратора)" name="hellocode">
    <br />
    <br />
     Выберите свой оригинальный цвет:
    <input type="color" id="color" name="color">
    <br />
    <br />
<button type = "submit" class="btn btn-primary" name = "submit">Зарегистрироваться</button>
<button class="btn" type = "reset">Очистить</button>
</form>
</div>

<br />
</center>

<?php

    if(isset($_POST['submit'])){
      $color = $_POST['color'];
   //   echo "<script> alert(".$color."); </script>";
      $name = $_POST['name'];	
      $family = $_POST['family'];
      $login = $_POST['login'];
      $password = $_POST['password'];
      $retpass = $_POST['retpass'];
      $code = $_POST['hellocode'];
      $paas = md5($password);
      
      $a=mysql_query("SELECT * FROM user WHERE login = '$login'");
      $login_data = mysql_fetch_array($a);
      
      
      if(($code!="")&&($code!="MANtheBEST")&&($code!="manteacher")){
    	  
    	  echo'<br /><div class = "alert alert-error">
                      Не правильный пригласительный код!!!
                        </div>';
      }
      
      
      else if($login_data['login']==$login){
    	echo  '<br /><div class="alert alert-error">
                 Такой логин уже существует!!!
               </div>';
      } 
     
      else if($password!=$retpass){
        echo '<br /> <div class="alert alert-error">
                 Пароли не совпадают!!!
               </div>';
      }
      
      
      else {
    	  
    	  if($code == "manthebest"){
    		  $cd = 1;
    	  }
    	  else if($code =="manteacher"){
    		  $cd = 2;
    	  }
    	  else {
    		  $cd = 0;
    	  }
        $password=md5($password);
        $query=mysql_query("INSERT INTO user VALUES('','$name','$family','$login','$password','$cd','', '', '', '', '','' , '' , '' , '' , now(),'$color')") or die(mysql_error());
    	$m=mysql_query("SELECT * FROM user WHERE login = '$login'");
    	$p = mysql_fetch_array($m);
    	$id = $p['Id'];
    	$_SESSION['Id'] = $id;
    	mysql_query("INSERT INTO avatars VALUES('$id','')")or die(mysql_error());
    	 echo("<script>location.href='../account'</script>");
      }
     
     }
?>

 </body>

</html>