<?php
 session_start();

    include("../account/functions/baza.php"); 
    
    $name = $_GET['name'];
    
    $_SESSION['input_form_name'] = $name;
  
?>