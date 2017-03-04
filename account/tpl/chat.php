<?php session_start();?>
<!DOCTYPE html>

<html>
 <head>
     
  <!--   <?php
  	 if(isset($_GET["port"])){
	    $_SESSION["port"] = $_GET["port"];
        echo("<script>location.href='portfolio.php'</script>");
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


}

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
   
  	 ?> -->
  	 
     
  <meta charset="utf-8">
  <title></title>
  
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

   
    <style>
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
			    border:1px solid black;
			    float:right;
	     		padding:1%;   
	     		width:50%;
	     		height:40%;
			}
		    #listchats{
		        float:left;
      //      border:1px solid black;
		        width:500px;
            width:30%;
		        height:60%;
		    }
        #cik{
          border:1px solid black;
          height:30px;
          background: #F9F2E3;
          
        }
        div#cik a:link{
          text-decoration:none;
          color:black;
        }
         div#cik a:visited{
          text-decoration:none;
          color:black;
        }
        div#cik a:hover{
          text-decoration:none;
          color:grey;
        }
		    </style>

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
<br />

<div id = "listchats">
<form method = "GET" action = "chat.php">    
  <br />
  <br />
  <br />
  
    <div id = 'cik' class = 'cik'><a href="chat.php?page=150">Общий чат</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=149">Авиамоделирование</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=148">Судомоделирование</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=147">Радиопеленгация</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=146">Операторы коллективной радиостанции</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=145">Автотрассовый моделизм</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=144">Картинг</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=143">Радиоуправляемые модели</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=142">Робототехника</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=141">3D Моделирование</a></div>
    <div id = 'cik' class = 'cik'><a href="chat.php?page=140">Радиопеленгация</a></div> 
  <br />
  <br />
  <br />

</form>
</div>
<?php
 if ($_GET["page"] == "150") { // Если GET-параметр равен big
    $_SESSION["page_id"] = 150; // Помещаем в сессию значение 30
  }
  elseif ($_GET["page"] == "149") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 149; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "148") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 148; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "147") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 147; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "146") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 146; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "145") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 145; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "144") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 144; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "143") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 143; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "142") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 142; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "141") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 141; // Помещаем в сессию значение 20
  }
   elseif ($_GET["page"] == "140") { // Если GET-параметр равен mid
    $_SESSION["page_id"] = 140; // Помещаем в сессию значение 20
  }

?>


<?php
if(isset($_SESSION['page_id'])){
    if($_SESSION['page_id']==150){
        echo "<center><h1>Общий чат</h1></center>"; 
    }
    elseif($_SESSION['page_id']==149){
        echo "<center><h1>Авиамоделирование</h1></center>"; 
    }
    elseif($_SESSION['page_id']==148){
        echo "<center><h1>Судомоделирование</h1></center>"; 
    }
    elseif($_SESSION['page_id']==147){
        echo "<center><h1>Радиопеленгация</h1></center>"; 
    }
    elseif($_SESSION['page_id']==146){
        echo "<center><h1>Операторы коллективной радиостанциии</h1></center>"; 
    }
    elseif($_SESSION['page_id']==145){
        echo "<center><h1>Автотрассовый моделизм</h1></center>"; 
    }
    elseif($_SESSION['page_id']==144){
        echo "<center><h1>Картинг</h1></center>"; 
    }
    elseif($_SESSION['page_id']==143){
        echo "<center><h1>Радиоуправляемые модели</h1></center>"; 
    }
    elseif($_SESSION['page_id']==142){
        echo "<center><h1>Робототехника</h1></center>"; 
    }
    elseif($_SESSION['page_id']==141){
        echo "<center><h1>3D Моделирование</h1></center>"; 
    }
     elseif($_SESSION['page_id']==140){
        echo "<center><h1>Радиопеленгация</h1></center>"; 
    }

}
?>
<br />
      <?php
  if(isset($_SESSION['Id']))  {
    $text_comment = $_POST["text_comment"];
    if(($text_comment != "") && ($text_comment != " ")){
  $page_id = $_SESSION['page_id'];
  $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
  $query=query("INSERT INTO allchat VALUES('$id','$page_id','$text_comment')")or die(mysql_error());
  $data=select_all("SELECT * FROM allchat WHERE page_id = '$page_id'");    
}
    if(isset($_SESSION['page_id'])){
	 echo "<div id='allchat' class='tab-main' overflow: auto; float:left>";
	 	echo"</div><br />
    <br />";
    }
}
  
  ?>
  <br />
  <br />
  <br />

  
  <?php 
  if(isset($_SESSION['Id']) && isset($_SESSION['page_id'])){
	  
echo' <div>
<center> 
<form name="chat" action="chat.php" method="post">
  <p>
    <br />
    <br />
    <br />
    <p></p>
    <input type = "text" name="text_comment" size = "50%">
    <input type="submit" name = "com" value="Отправить" />
  </p>
</form> 
</center> 
</div>';
  }
  
  

?>
  <br />
  <br />
  <br />
  <br />
  
  	 
 </body>
 
 <script>  

    function show(){  
        $.ajax({ 
            url: "time.php",  
            cache: false,  
            success: function(html){  
                $("#allchat").html(html);  
            }  
        });  
    }
    $(document).ready(function(){  
        show();  
        $("#allchat").attr({ scrollTop: $("#allchat").attr("scrollHeight") });
        setInterval('show()',4000); 
   
    });  

</script>
  	
</html>