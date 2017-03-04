
<?php
session_start();
 include("../functions/baza.php"); 

    $page_id = $_SESSION['page_id'];
    

   $data=select_all("SELECT * FROM allchat WHERE page_id = '$page_id'");
  
   foreach($data as $key => $value){
   $cvb = $value['id'];  
   $asdf=mysql_query("SELECT * FROM user WHERE Id = '$cvb'");
   $dfgh = mysql_fetch_array($asdf);
   
    $color = $dfgh['color'];
    
	$name=$dfgh['name'];
    $family=$dfgh['family'];
    
    if($value['text_comment']!="" && $value['text_comment']!=" "){
        if($_SESSION['Id'] == $cvb){
            echo "<font color = ".$color."><strong><p align = 'right'>Ты: </strong></font>".$value['text_comment']."</p>";
        }
        else{
	     echo "<p><a href = portfolio.php?port=".$cvb."><font color = '".$color."'><strong>$name $family: </strong></font></a>";
		 echo $value['text_comment'] ."</p>";
	//	 echo "<br>";
        }
    }

	 } 
?>