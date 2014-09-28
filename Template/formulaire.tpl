<div class="span8">
        <center><h2><font color="red">{$action_label} un article</font></h2>




            <form action="formulaire.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_article" value="{$data['id_article']}" >
                Titre
                <br><input type="text" name ="titre" value="{$data['titre']}"></input>
                <br>
                <br>
                Texte
                <br><textarea name ="texte" >{$data['contenu']}</textarea>
                <br>
                <br>
                Image
                <br>
                <br><input type="file" name="image" value="Choisissez un fichier"></input>
                <br>
                <br>
                Publi&eacute;   &nbsp;&nbsp;&nbsp; <input type="checkbox" name="publie" {if $data['publication'] == 1} checked="checked"{/if} value="1" ></input>
                <br>
                <br><input type="submit" name="{$action_label}" value="{$action_label}" class="btn btn-large btn-primary"></input>





            </form>
        </center>
    </div>
