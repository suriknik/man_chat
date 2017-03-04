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
   
    <style>

        .container{overflow:hidden;width:70%}
        .box{white-space:nowrap}
        .box div{width:50%;display:inline-block;}

		@import "./css/font-awesome.css";
		.preserve-3d {
		transform-style: preserve-3d;
		-webkit-transform-style: preserve-3d;
		}

			*, *::before, *::after{
			  box-sizing: border-box; 
			  -webkit-box-sizing: border-box; 
			  -moz-box-sizing: border-box; 
			  -o-box-sizing: border-box;  
			}

			.azul {
			  color: #0F6698;
			}

			.verde {
			  color: #669900;  
			}

			.vermelho {
			  color: #cc3333; 
			}

			.laranja {
			  color: #ff6600;
			}

			.roxa {
			  color: #663399;
			}

			.verde-claro {
			  color: #cccc33;
			}

			.menu {
			  border-bottom: 1px solid #000;
			  text-align: center;
			  height: 60px;
			  overflow: hidden;
			  margin: 20px auto;
			  width: 480px;
			  font-size: 3em;
			  cursor: default;
			}

			.menu i {
			  position: relative;
			  top: 30px;
			  transition: .2s ease;
			}

			.menu i:hover {
			  top: 13px;
			}
			
			.tab-main{
			    overflow-x: hidden; 
			     border:6px dotted black;
			}
			</style>

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
<li align = "right">]

<?php 

// $_SESSION["page_id"] = 150;
if(isset($_SESSION['Id'])){
    include("../functions/baza.php"); 
    
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
	
		echo("<script>location.href='../index.php'</script>");
   
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
  <?
   $port_id = $_GET['port'];
    $id=$_SESSION['Id'];
    
     $azs = mysql_query("SELECT * FROM avatars WHERE id = '$port_id'");
     $azaza = mysql_fetch_array($azs);
   
      $_SESSION['port_avatar'] = $azaza['url'];
    
    $query=mysql_query("SELECT * FROM user WHERE Id = '$port_id'");
    $user_data = mysql_fetch_array($query);
	 $port_name = $user_data['name'];
    $port_family=$user_data['family'];
    $port_c=$user_data['code'];
    $port_sex = $user_data['sex'];
    $port_date = $user_data['birthday'];
    $port_kry = $user_data['circles'];
    $port_city = $user_data['city'];
    $port_tel = $user_data['tel'];
    $port_color = $user_data['color'];
 
 
  if(!empty($port_date) || !empty($port_sex) || !empty($port_kry) || !empty($port_city) || !empty($port_tel)){
       $_SESSION['infa'] = 1;
   }
    echo "<center> <font color = ".$port_color."> <h1> ".$port_name." ".$port_family."</h1> </font>";
echo "
<div id = 'container'>
    <div id = 'box'>
    <div>";
        if (!empty($_SESSION['port_avatar'])){
            $str = $_SESSION['port_avatar']; 
            echo '<img src = "../'.$str.'" width = "35%">';
        }
        else{
            echo "<img src = '../1.jpg' width = '35%'/>";
        }
        
        echo "</div><div>";
        
        if(!empty($_SESSION['infa'])){
    
   echo"<br /><center><h3>Информация:</h3><p class = 'bg-success'><b>Дата рождения:</b>  ".$port_date."</p><p class = 'bg-success'><b>Любимые кружки:</b> ".$port_kry."</p>
   <p class = 'bg-success'><b>Номер телефона: </b>".$port_tel."</p><p class = 'bg-success'><b>Город: </b>".$port_city."</p>";
   
   if($port_c == 2){
       echo " <p class = 'bg-success'><b>Статус: </b> Учитель</p>";
   }
   elseif($port_c == 1){
       echo "<p class = 'bg-success'><b>Статус: </b> Ученик</p>";
   }
   else{
       echo "<p class = 'bg-success'><b>Статус: </b> Посетитель</p>";
   }
   
        }

   echo "</center><br /> <br />";
  ?>
  </div>
  </div>
  </div>
  <center>
      <h2>Написать письмо</h2>
    <form method = "POST" action = "#">  
      Тема: <input type = "text" name = "head" id = "head" /> <br />
      Текст: <textarea name = "mail" id = "mail"></textarea>
      <br />
      <button type = "reset">Очистить форму</button>
      <button name = "submit" id = "submit">Отправить</button>
    </form>  
   </center>
 <?
   if(isset($_POST['submit'])){
       $header = $_POST['head'];
       $text = $_POST['text'];
       $mail = $_POST['mail'];
       mysql_query("INSERT INTO ls VALUES('', '$port_id', '$id', '$header', '$mail', now(),'0')")or die(mysql_error());
       echo "<script> alert('Сообщение отправлено');</script>";
   }
 ?>






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
   }
  
 
 
 else if($c==1){
   
  echo "<div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>
<li class = 'active'><a href='#'>Объявления</a></li>
<li class='divider-vertical'></li>
<li><a href='numberdes.php'>Сообщения</a></li>
<li class='divider-vertical'></li>
<li class = 'divider-vertical'></li>
<li><a href='tpl/chat.php'>Чат</a></li>
<li class = 'divider-vertical'></li>
</ul></div>
</div>
</div>
</div>"; }
 
 
 
else if($c==2){
   
  echo "<div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>
<li><a href  = '../'>Моя Cтраницa</a></li>
<li class='divider-vertical'></li>

<li ><a href='chat.php'>Чат</a></li>
<li class = 'divider-vertical'></li>


<li><a href='letters.php'>Письма</a></li>
<li class = 'divider-vertical'></li>

<li><a href = 'report.php'>Объявления</a></li>

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