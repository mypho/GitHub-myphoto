<?php
session_start();
 
$code = $_POST['yzm_code']; 
if($code==$_SESSION["yzm_code"]){ 
   echo '1'; 
} 
?>