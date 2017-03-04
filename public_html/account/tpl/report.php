<?php session_start();?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title></title>
  

   <link rel="stylesheet" href="../style/style.css">
       <link rel="stylesheet" href="../style/bootstrap2.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
	<link rel="stylesheet" href="../style/xoverlay.css">
	<link rel="stylesheet" href="../style/font-awesome.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src = "../js/jquery-1.11.3.min.js" type = "text/javascript"></script>
	
   

 </head>
 <body>
 
 
 
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
$connection = mysql_connect("localhost","i9781008_mansur","aa08072003");
     $db = mysql_select_db("i9781008_mansur");
 include("../functions/codir.php"); 
    
   $id=$_SESSION['Id'];
   $query=mysql_query("SELECT * FROM user WHERE Id = '$id'");
   $user_data = mysql_fetch_array($query);
		
	$name=$user_data['name'];
    $family=$user_data['family'];
	$c=$user_data['code'];


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
  <?php

if(isset($_SESSION['Id'])){ 
    if($c==2){
echo '
<center>
<h4>Добавить объявление:</h4>
<form class="form-horizontal" method = "post" action = "#">

<input type="text" class="form-control" id="inputName" placeholder="Заголовок" name = "title" required>  
        <br />
        <br />
<textarea type="text" class="form-control" id="inputFamily" name = "text" required></textarea> Текст <br /><br />
<button type = "submit" class="btn btn-primary" name = "submit">Добавить</button>
</form>
</center>';
  }
}
?>


  
<?php
if(isset($_POST['submit'])){
  $title = $_POST['title'];	
  $text = $_POST['text'];
    $query=mysql_query("INSERT INTO report VALUES('$id','$title','$text')")or die(mysql_error());
  }
?>


<?php

    include("../functions/baza.php"); 
   $data=select_all("SELECT * FROM report");
  	 foreach($data as $key => $value){
   $cvb = $value['id'];  
   $asdf=mysql_query("SELECT * FROM user WHERE Id = '$cvb'");
   $dfgh = mysql_fetch_array($asdf);
		
	$name2=$dfgh['name'];
    $family2=$dfgh['family'];
      
   
echo"	<div class='col-md-3 col-sm-6 col-xs-6 xdefault-padding'>
<div class='col-md-12'>
<div class='xoverlay x-zoom-rotate'>
<img class='x-img-main' src='../images/i.jpg' alt=''>
<div class='xoverlay-box'>
<div class='xoverlay-data'>
<h2> $name2 $family2: ";
echo $value['title'];
echo"</h2><br /><br /><p>";
echo $value['text'];
echo"</p></div>
</div>
</div>
</div>
</div>
</div>";
	 
	 } 
?>

<br />
<br />
<br />
<br />
<br />
<br />


 <?php
  if(isset($_SESSION['Id'])){
	  
    
    
   if($c==0){

  echo "<div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>
<li class = 'active'><a href='#'>Объявления</a></li>
<li class='divider-vertical'></li>
<li><a href='numberdes.php'>Сообщения</a></li>
<li class='divider-vertical'></li>
<li><a href='numberdes.php'>Группы</a></li>
<li class = 'divider-vertical'></li>
</ul></div>
</p></div>
</p></div>
</p></div>


";
 if(!isset($_SESSION['helmass'])){

	 
	 $_SESSION['helmass']=true;
	 
	$_SESSION['helmass']++;
 echo " 
 <script>
 alert('Здравствуйте, $name $family!!!');
 </script>
 ";
 }

 }
 
 
 
 else if($c==1){
	 
	echo "<div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>
<li><a href  = '../index.php'>Моя страницa</a></li>
<li class='divider-vertical'></li>

<li><a href='chat.php'>Чат</a></li>
<li class = 'divider-vertical'></li>

<li class = 'active'><a href = '#'>Объявления</a></li>
<li class = 'dividier-vertical'></li>

</ul></div>
</p></div>
</p></div>
</p></div>";
 
 
  	 
	 if(!isset($_SESSION['helmass'])){

	 
	 $_SESSION['helmass']=true;
	 
	$_SESSION['helmass']++;
 echo " 
 <script>
 alert('Привет, $name $family!!!');
 </script>
 ";
 }
 }
 
 
 
else if($c==2){
	 
	echo "<div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>
<li><a href  = '../index.php'>Моя страницa</a></li>
<li class='divider-vertical'></li>

<li><a href='chat.php'>Чат</a></li>
<li class = 'divider-vertical'></li>

<li class = 'active'><a href = '#'>Объявления</a></li>
<li class = 'dividier-vertical'></li>
</ul>

<ul class='nav pull-right'>
<li align = 'right'>
<a href = 'tablepol.php'>Таблица пользователей</a></li>
</li>
</ul>
</div>
</p></div>
</p></div>
</p></div>";
 
 
  	 
	 if(!isset($_SESSION['helmass'])){	 
	 $_SESSION['helmass']=true;
	 
	$_SESSION['helmass']++;
 echo " 
 <script>
 alert('Здравствуйте, $name $family!!!');
 </script>
 ";
 }
 }
  }
	 
		 ?>  


</body></html>