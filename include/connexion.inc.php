<?php

mysql_connect("mysql.hostinger.fr", "u137020477_wael", "ratlprsc1314") or die ("Connexion impossible : ".mysql_error());
mysql_select_db("u137020477_bslim");

$connect = FALSE;
if (isset($_COOKIE['sid'])) {
    $cookies = $_COOKIE['sid'];
    $sqlcookies = ("SELECT COUNT(*) AS sid FROM users WHERE sid = '$cookies'");
    $co = mysql_query($sqlcookies);
    $data = mysql_fetch_array($co);
    if ($data['sid']){
        $connect = TRUE;
    }
    }

?>
