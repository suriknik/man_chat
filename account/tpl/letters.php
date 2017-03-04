<?php session_start();
if(empty($_GET['m'])){
    $_GET['m'] = 1;
}




// $_SESSION["page_id"] = 150;
if(isset($_SESSION['Id'])){
    include("../functions/baza.php"); 
    
   $id=$_SESSION['Id'];
   $query=mysql_query("SELECT * FROM user WHERE Id = '$id'");
   $user_data = mysql_fetch_array($query);
    
  $name=$user_data['name'];
    $family=$user_data['family'];
    $c=$user_data['code'];


   if(isset($_SESSION['Id'])){
   
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
  
  }
?>
<!DOCTYPE html>

<html>
 <head>
  <meta charset="utf-8">
  <title></title>
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



 <div style="width:200px; float:left;">
    
     <center>
         <br />
        <p><a href = "letters.php?m=1">Все письма</a></p>
        <p><a href = "letters.php?m=2">Непрочитанные письма</a></p>
        <p><a href = "letters.php?m=3">Входящие</a></p>
        <p><a href = "letters.php?m=4">Отправленные</a></p>
        <br />
    </center>
</div>

<div style="margin-left:220px; text-align:right;">
    <?php
    
  if(isset($_GET["m"])){
    if($_GET["m"] == "1"){
        
         $i = 0;
        $data=select_all("SELECT * FROM ls WHERE 1");
         foreach($data as $key => $value){
          if($data['bool'] == 0){
              $i++;
          }   
         }
         if($i != 0){
          echo "
        <center><h3>Все письма:</h3>
        <table class='table table-hover'> 
        <thead>
             <tr>
                  <th>#</th>
                  <th>Имя отправителя</th>
                  <th>Тема</th>
                  <th>Время</th>
             </tr>
        </thead>
        <tbody>"; 
        }

        if($i != 0){
        $i = 0;
           foreach($data as $key => $value){
            if($value['id'] == $id || $value['id_ot'] == $id){
                   $i++;
                   $cvb = $value['id_ot'];  
                   $asdf=mysql_query("SELECT * FROM user WHERE Id = '$cvb'");
                   $dfgh = mysql_fetch_array($asdf);
                   
                    $color = $mass[$dfgh['color']];
                    
                	$name152=$dfgh['name'];
                    $family152=$dfgh['family'];
                    echo " <tr>
                    <th scope=row><a href='1.php?n=".$value['id_mail']."'>$i</a></th>
                    <td>";
                    echo "<font color = '".$color."'>".$name152 ." ". $family152."</font>";
                    echo "</td><td>";
                    echo $value['header'];
                    echo"</td>
                    <td>";
                    echo $value['time'];
                    echo "</td>
                   </tr>";
                }	 
           }
        	 
        }
        else{
            echo "<br /><center><h4> У Вас нет писем! </h4></center>";
        }
       
    }
    
    
    else if($_GET["m"] == "2"){
        
         $i = 0;
        $data=select_all("SELECT * FROM ls WHERE id = '$id'");
         foreach($data as $key => $value){
          if($data['bool'] == 0){
              $i++;
          }   
         }
         if($i != 0){
          echo "
        <center><h3>Новые письма:</h3>
        <table class='table table-hover'> 
        <thead>
             <tr>
                  <th>#</th>
                  <th>Имя отправителя</th>
                  <th>Тема</th>
                  <th>Время</th>
             </tr>
        </thead>
        <tbody>"; 
        }
    
        if($i != 0){
        $i = 0;
           foreach($data as $key => $value){
             if($data['bool'] == 0){      
                   $i++;
                   $cvb = $value['id_ot'];  
                   $asdf=mysql_query("SELECT * FROM user WHERE Id = '$cvb'");
                   $dfgh = mysql_fetch_array($asdf);
                   
                    $color = $mass[$dfgh['color']];
                    
                	$name152=$dfgh['name'];
                    $family152=$dfgh['family'];
                    echo " <tr>
                    <th scope=row><a href='1.php?n=".$value['id_mail']."'>$i</a></th>
                    <td>";
                    echo "<font color = '".$color."'>".$name152 ." ". $family152."</font>";
                    echo "</td><td>";
                    echo $value['header'];
                    echo"</td>
                    <td>";
                    echo $value['time'];
                    echo "</td>
                   </tr>";
                }	 	 
        	 
            }
        }
        else{
            echo "<br /><center><h4> У Вас нет непрочитанных писем! </h4></center>";
        }
    }
    
    
    else if($_GET["m"] == "3"){
          $i = 0;
        $data=select_all("SELECT * FROM ls WHERE id = '$id'");
         foreach($data as $key => $value){
          if($data['bool'] == 0){
              $i++;
          }   
         }
         if($i != 0){
          echo "
        <center><h3>Входящие письма:</h3>
        <table class='table table-hover'> 
        <thead>
             <tr>
                  <th>#</th>
                  <th>Имя отправителя</th>
                  <th>Тема</th>
                  <th>Время</th>
             </tr>
        </thead>
        <tbody>"; 
        }

        if($i != 0){
        $i = 0;
           foreach($data as $key => $value){
                   $i++;
                   $cvb = $value['id_ot'];  
                   $asdf=mysql_query("SELECT * FROM user WHERE Id = '$cvb'");
                   $dfgh = mysql_fetch_array($asdf);
                   
                    $color = $mass[$dfgh['color']];
                    
                  	$name152=$dfgh['name'];
                    $family152=$dfgh['family'];
                    echo " <tr>
                    <th scope=row><a href='1.php?n=".$value['id_mail']."'>$i</a></th>
                    <td>";
                    echo "<font color = '".$color."'>".$name152 ." ". $family152."</font>";
                    echo "</td><td>";
                    echo $value['header'];
                    echo"</td>
                    <td>";
                    echo $value['time'];
                    echo "</td>
                   </tr>";
                }	 	 
        	 
        }
        else{
            echo "<br /><center><h4> У Вас нет писем! </h4></center>";
        }
      }
        
        else if($_GET["m"] == "4"){
                  $i = 0;
        $data=select_all("SELECT * FROM ls WHERE id_ot = '$id'");
         foreach($data as $key => $value){
          if($data['bool'] == 0){
              $i++;
          }   
         }
         if($i != 0){
          echo "
        <center><h3>Отправленные письма:</h3>
        <table class='table table-hover'> 
        <thead>
             <tr>
                  <th>#</th>
                  <th>Имя отправителя</th>
                  <th>Тема</th>
                  <th>Время</th>
             </tr>
        </thead>
        <tbody>"; 
        }
  
        if($i != 0){
        $i = 0;
           foreach($data as $key => $value){
                   $i++;
                   $cvb = $value['id_ot'];  
                   $asdf=mysql_query("SELECT * FROM user WHERE Id = '$cvb'");
                   $dfgh = mysql_fetch_array($asdf);
                   
                    $color = $mass[$dfgh['color']];
                    
                	$name152=$dfgh['name'];
                    $family152=$dfgh['family'];
                    echo " <tr>
                    <th scope=row><a href='1.php?n=".$value['id_mail']."'>$i</a></th>
                    <td>";
                    echo "<font color = '".$color."'>".$name152 ." ". $family152."</font>";
                    echo "</td><td>";
                    echo $value['header'];
                    echo"</td>
                    <td>";
                    echo $value['time'];
                    echo "</td>
                   </tr>";
                }	 	 
        	 
        }
        else{
            echo "<br /><center><h4> У Вас нет писем! </h4></center>";
    }
  }
}
    
?>
</tbody>
</table>
</center>
<br />
<br />


</div>

  <br />
  <br /> 
 </body>	
</html>