<?php session_start();?>
<?php
 include("../functions/codir.php"); 
    $connection = mysql_connect("localhost","i9781008_mansur","aa08072003");
    $db = mysql_select_db("i9781008_mansur");


?>
<!DOCTYPE html>
<html>
 <head>
   <title>Регистрация</title>
   <meta charset = "UTF-8">
   
   <link rel="stylesheet" href="../style/style.css">
   <link rel="stylesheet" href="../style/bootstrap.min.css">   
   <link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../style/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../style/demo.css" />
		<link rel="stylesheet" type="text/css" href="../style/component.css" />

  <!-- <script src = "../js/jquery-1.11.3.min.js" type = "text/javascript"></script>
   <script src = "../js/bootstrap.min.js"     type = "text/javascript"></script>
   
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="/tiny_mce/tiny_mce_init.js"></script>-->
    
    <script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>

    <script type="text/javascript">
    	tinyMCE.init({
    		// General options
    		mode : "textareas",
    		theme : "advanced",
    		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
    
    		// Theme options
    		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
    		theme_advanced_toolbar_location : "top",
    		theme_advanced_toolbar_align : "left",
    		theme_advanced_statusbar_location : "bottom",
    		theme_advanced_resizing : true,
    
    		// Example content CSS (should be your site CSS)
    		content_css : "css/content.css",
    
    		// Drop lists for link/image/media/template dialogs
    		template_external_list_url : "lists/template_list.js",
    		external_link_list_url : "lists/link_list.js",
    		external_image_list_url : "lists/image_list.js",
    		media_external_list_url : "lists/media_list.js",
    
    		// Style formats
    		style_formats : [
    			{title : 'Bold text', inline : 'b'},
    			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
    			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
    			{title : 'Example 1', inline : 'span', classes : 'example1'},
    			{title : 'Example 2', inline : 'span', classes : 'example2'},
    			{title : 'Table styles'},
    			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    		],
    
    		// Replace values for the template plugin
    		template_replace_values : {
    			username : "Some User",
    			staffid : "991234"
    		}
    	});
    </script>
   
   
   <style>
       #yournews{
           background-color:lightyellow;
           width:100%;
       }
       
       #op{
        // border:1px solid black;
         background-color:beige;
       }
   </style>
 </head>
 
 
 <body>
<div>
<div class="navbar  navbar-fixed-top navbar-inverse " style="margin: -1px -1px 0;">
<div class="navbar-inner ">
<div class="container" style="width: auto; padding: 0 20px;">
                  <a class="brand" href="../index.html">Surikon</a></p>
<ul class="nav">
<li><a href="../index.php">Домой</a></li>
<li class="divider-vertical"></li>
<li class = 'active'><a href="#">Новости</a></li>
<li class="divider-vertical"></li>
<?php
if(!isset($_SESSION['Id'])){
echo "<li><a href='indoor.php'>Войти</a></li>";
}
?>
</ul>

<ul class="nav pull-right">
<li align = "right"><?php
  
    
   if(isset($_SESSION['Id'])){  
   $id = $_SESSION['Id'];
   $query=mysql_query("SELECT * FROM user WHERE Id = '$id'");
   $user_data = mysql_fetch_array($query);
   $c = $user_data['code'];	
	$name=$user_data['name'];
    $family=$user_data['family'];
    $news_id = $_SESSION['news_id'];
    $quey = mysql_query("SELECT * FROM news WHERE news_id = '$news_id'");
    $user_data2 = mysql_fetch_array($quey);
    $text_news = $user_data2['text'];
    $title_news = $user_data2['title'];
    $op = $user_data2['op'];
    $user_news_id = $user_data2['id'];
    
    $vvv = mysql_query("SELECT * FROM user WHERE Id = '$user_news_id'");
    $var = mysql_fetch_array($vvv);
    
    $news_name = $var['name'];
    $news_family = $var['family'];


echo "<span class = 'regname'> $name  $family </span>

    <li class='divider-vertical'></li>
"

;
	 }
	 
 
?>
  </li>

   <li align = "right">
   
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
 echo "<center>".$name. " " . $family.": <strong>". $title_news ."</strong></center><br />";
 
 echo "<div id = 'op'>".$op."</div><br />";
 
 echo  $text_news;
?>
</center>
<br />
<br />
<br />
<br />




 <?php
  if(isset($_SESSION['Id'])){
  
  echo"

  <div>
<div class='navbar  navbar-fixed-bottom navbar-inverse ' style='margin: -1px -1px 0;'>
<div class='navbar-inner '>
<div class='container' style='width: auto; padding: 0 20px;'>
                  
<ul class='nav'>

<li><a href='../account/index.php'>Моя страница</a></li>
<li class='divider-vertical'></li>

<li><a href='../account/tpl/chat.php'>Чат</a></li>
<li class = 'divider-vertical'></li>

<li><a href = '../account/tpl/report.php'>Объявления</a></li>
<li class = 'dividier-vertical'></li>

</ul></div>
</p></div>
</p></div>
       ";
  }	 
  ?>





 </body>

</html>