


<?php require_once 'include/connexion.inc.php';// CONNEXION_BASE_DE_DONNEE ?>

<!En tete-- >
<?php include_once "include/header.inc.php"; ?>

<div class="span8">
    
<?php
setcookie('sid','',-1);
?> 
    
<p>
 Deconnexion 
</p>

<?php
header("refresh: 3; url=index.php");
?>

</div>

<!Menu -->
<?php include_once "include/menu.inc.php"; ?>

<!Pied de page -->
<?php include_once "include/footer.inc.php"; ?>
