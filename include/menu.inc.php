
<nav class="span4">
    
    <h3>Menu</h3>
    
    <form action="index.php" method="get">
        <br><input type="text" name ="titre" value=""></input>
        <br><input type="submit" name="" value="Rechercher" class="btn btn btn-primary"</input>
    </form>
	

    
    <ul>
      <br>
        <li><a href="index.php">Accueil</a></li>
		
         <li><a href="formulaire.php">Ajouter un article</a></li>
         <?php
         if($connect == true)
        {
         ?>
         <li><a href="deconnexion_user.php">Deconnexion</a></li>
         <?php
         }
         else 
         {
          ?>
         <li><a href="connexion_user.php">Connexion</a></li>
         <?php 
         } 
         ?>
    </ul>

</nav>

