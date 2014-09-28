
<?php

require_once 'include/connexion.inc.php';//CONNEXION_BASE_DE_DONNEE 
include_once "include/header.inc.php";

?>

<?php

echo'<div class="span8">';
    
   
 //LA PAGINATION
    
   $nbArticleParPage = 2;
   $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
   $sqlcount = ("SELECT COUNT(*) AS id_article FROM article WHERE publication=1");
   
   $result = mysql_query($sqlcount);
   $data = mysql_fetch_array($result);
   $total = $data['id_article'];
   
   $nbTotalDePage = ceil($total / $nbArticleParPage);
   $debut = ($page - 1) * $nbArticleParPage; // INDEX_DE_DEPART
   
   $sql = ("SELECT id_article, contenu, titre, DATE_FORMAT(date, '%d/%m/%Y') as date FROM article WHERE publication=1 ORDER BY date DESC LIMIT $debut, $nbArticleParPage");
    
 for ($i=1; $i<=$nbTotalDePage; $i++)
   {
     echo "<a href='index.php?page=$i'>$i</a> ";
   }
   
 //RECHERCHE_ARTICLES
            
 if (isset($_GET['titre'])) 
   {
    $recherche= $_GET['titre'];
    
 //requete SQL pour la selection de l'article
    
    $sql = "select id_article,contenu,titre,DATE_FORMAT(date,'%d/%m/%Y') as date FROM article WHERE article.publication = 1 AND (article.titre like '%$recherche%' or article.contenu like '%$recherche%') ORDER BY article.contenu";
    $requete = mysql_query($sql);
        
//COMPTAGE_ARTICLES
  
    $sql2 = "select count(*) as id_article from article where publication=1 and (titre like '%$recherche%' or contenu like '%$recherche%')";
    $result = mysql_query($sql2); // Requete_comptage
    $data = mysql_fetch_array($result);  // Affichage_tab
    $total = $data['id_article'];
    
// Condition_Affichage<1
    
      if($total<1)
       echo "Pas d'article qui correspond ";
      
      else
       echo "Il y a ".$total." Article(s).";  
      
      while ($ligne = mysql_fetch_array($requete))
      {
       echo "<h2> $ligne[titre]</h2>$ligne[date] - ";
       echo " " . "$ligne[contenu]";
       echo "<img src = 'img/$ligne[id_article].jpg' width = '1024' height = '768' alt = '1'/>";
       echo "<a href ='formulaire.php?id_article=$ligne[id_article]'> Modifier un article </a>";
      }
    } 
    
 else 
    {
     $sql = "select id_article,contenu,titre,DATE_FORMAT(date,'%d/%m/%Y') as date FROM article WHERE article.publication = 1 ORDER BY article.date LIMIT $debut, $nbArticleParPage";
        
//AFFICHAGE_2_ARTICLES_DE_PLUS_RECENT_AU_PLUS_VIEUX
     
     $requete = mysql_query($sql);
      while ($ligne = mysql_fetch_array($requete)) 
       {
          ?>
          <a href="article.php?id=<?php echo $ligne['id_article']; ?>"><?php echo "<h2> $ligne[titre]</h2>";?></a>
<?php
        echo "$ligne[date] - ";
        echo "" . "$ligne[contenu]";
        echo "<img src = 'img/$ligne[id_article].jpg' width = '1024' height = '768' alt = '1'/>";
        echo "<a href ='formulaire.php?id_article=$ligne[id_article]'> Modification de l'article- </a>";
        ?>
        <a href="supression-article.php?id=<?php echo $ligne['id_article']; ?>">supprimer article-</a><br/>
        <?php
       }
       
     }
     
?>

</div>

<!--MENU-->

<?php include_once "include/menu.inc.php"; ?>

<!-- PIED_DE_PAGE -->

<?php include_once "include/footer.inc.php"; ?>
