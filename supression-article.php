<?php 
require_once 'include/connexion.inc.php';  // Connexion_base_donnée 
?>

<?php

  if (isset($_GET['id'])) 
   {
     $id= $_GET['id'];
     $page=$_POST['id_page'];
     $sql = "DELETE FROM article WHERE id_article=$id";
  
     mysql_query($sql);

     header('location:index.php');
   }
 
?>
