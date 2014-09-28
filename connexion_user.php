

<?php require_once 'include/connexion.inc.php';// CONNEXION_BASE_DE_DONNEE?>

<?php require_once 'include/connexion.inc.php';//CONNEXION_BASE_DE_DONNEE?>

<?php

//CONNEXION_USER

if (isset($_POST['connecter'])) 
    
 {
      $email = $_POST['email'];
      $password = $_POST['password'];
      
//REQ_SELECTION_TAB_USERS   
 
   $req = "SELECT * FROM users WHERE (email='$email' AND password = '$password')";
 
   $execute = mysql_query($req);
   
   if($resultat = mysql_fetch_array($execute)) // Execution
           
    {  
//Encodage md5
       $sid = md5($resultat['email'] . time());
       $req1 = "UPDATE users SET sid = '$sid' WHERE email = '".$resultat['email']."'";
       mysql_query($req1);
       
 // COOKIE_SID
       
        setcookie('sid', $sid, time() + 15*60);
        header("location:index.php"); //INDEX_red
    }
    
    else 
    {
        echo ' Email ne correspond pas avec mot de passe !'; // Message en cas ou le mail n'est pas conforme avec mot de passe 
    }
} 

else 
    
{
    
?>

<!En TETE -->
<?php include_once "include/header.inc.php"; ?>
<div class="span8">


    <h1> Connexion </h1>
    <br>
    <form action="connexion_user.php" method="post" enctype="multipart/form-data">
        Email
        <br><input type="text" name ="email" value=""></input>
        <br>
        Mot de passe
        <br><input type="password" name ="password" value=""></input>
        <br>
        <br><input type="submit" name="connecter" value="Se connecter" class="btn btn-default btn-primary"></input>
        <br>
        <br>
        </div>

  <!MENU -->
<?php include_once "include/menu.inc.php"; ?>

  <!PIED_DE_PAGE -->
<?php include_once "include/footer.inc.php";
}
?>


