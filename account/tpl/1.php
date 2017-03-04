<?php session_start();?>
<!DOCTYPE html>

<html>
 <head>
  <meta charset="utf-8">
  <title></title>
  

    <link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="../style/button.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src = "../js/jquery-1.11.3.min.js" type = "text/javascript"></script>
    <script src="../js/modernizr.custom.js"></script>
 </head>
 <body>

     
 <br />
<div id="header">
  <div>
<div class="navbar  navbar-fixed-top navbar-inverse " style="margin: -1px -1px 0;">
<div class="navbar-inner ">
<div class="container" style="width: auto; padding: 0 20px;">
                  <a class="brand" href="#">Surikon</a></p>
<ul class="nav">
<li><a href="../../index.php">Домой</a></li>
<li class="divider-vertical"></li>
<li><a href="../../tpl/news.php">Новости</a></li>
<li class="divider-vertical"></li>

<?php 
    if(!isset($_SESSION['helmass'])){
echo"<li><a href='tpl/indoor.php'>Войти</a></li>";
	}
?>
</ul>


<ul class="nav pull-right">
<li align = "right"><?php 

if(isset($_SESSION['Id'])){
    include("../functions/baza.php"); 
    
   $id=$_SESSION['Id'];
   $query=mysql_query("SELECT * FROM user WHERE Id = '$id'");
   $user_data = mysql_fetch_array($query);
		
	$name=$user_data['name'];
    $family=$user_data['family'];
    $c=$user_data['code'];
    
    
    $mail_id = $_GET['n'];
    
    $query1 = mysql_query("SELECT * FROM ls WHERE id_mail = '$mail_id'");
    $user_data1 = mysql_fetch_array($query1);
    $id_ot = $user_data1['id_ot'];
    $header = $user_data1['header'];
    $time = $user_data1['time'];
    $text = $user_data1['text'];

echo "<span class = 'regname'> $name  $family </span> 

<li class='divider-vertical'></li>

";
    
}
?>
</li>
<li>
<?php

   if(isset($_SESSION['Id'])){
   
echo"
 <a href='index.php?naw=out'>Выйти</a>
  ";
	
	if (isset($_GET['naw'])){
	$naw = trim($_GET['naw']);
}else $naw = '';
 
 switch($naw){
  case 'out': 
   
    session_destroy();
	
	echo("<script>location.href='../../index.php'</script>");
   
   echo $page;
   break;	
	
	
	}
	
	
   }
   
	
	?>

</li>
</ul>
</div>
</p></div>
</p></div>
</p></div>
  
  </div>

<br />
<br />
<br />
<center>
    

    
<?php
if($header){
    echo "Тема: ".$header;
}
echo "<br />";
if($text){
 echo "Текст: ";
 echo "$text";
}
else{
    echo "Пусто";
}

?>

<br />
<br />

</center>
  <?php
  
 mysql_query("UPDATE ls SET bool = '1' WHERE Id = '$id'");

  if(isset($_SESSION['Id'])){
 if($c==false){

  echo "<div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>
<li><a href='../index.php'>Моя Страница</a></li>
<li class='divider-vertical'></li>

<li class = 'active'><a href = '#'>Чат</a></li>
<li class = 'divider-vertical'></li>

<li><a href = 'myreport.php'>Объявления</a></li>
<li class = 'dividier-vertical'></li>
</ul></div>
</div>
</div>
</div>";
 }
 
 
 
 else{
	 
	echo "<div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>
<li><a href='../index.php'>Моя Страница</a></li>
<li class='divider-vertical'></li>

<li class = 'active'><a href = '#'>Чат</a></li>
<li class = 'divider-vertical'></li>

<li><a href = 'report.php'>Объявления</a></li>
<li class = 'dividier-vertical'></li>
</ul>
<ul class='nav pull-right'>
<li align = 'right'>
<a href = 'tablepol.php'>Таблица пользователей</a></li>
</li>
</ul>

</div>
</div>
</div>
</div>";
 } 
 }
  	 ?> 

  	 
  	 
 </body>
</html>