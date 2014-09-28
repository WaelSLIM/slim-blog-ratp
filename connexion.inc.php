<?php

   mysql_connect("mysql.hostinger.fr", "u137020477_wael", "ratlprsc1314") or die ("Connexion impossible : ".mysql_error());
   mysql_select_db("u137020477_wael");

$connect = false;

  if (isset($_COOKIE['sid']))
   {
    $session = $_COOKIE['sid'];

    $req = "SELECT count(*) AS total FROM users WHERE sid = '$session'";
	
    //PRINT_R>>$req
    $excute =  mysql_query($req);
    
    //VAR_DATA
    $data = mysql_fetch_array($excute);
    
    //ECHO_DATA_TOTAL
    $connect = true;
   }
?>
