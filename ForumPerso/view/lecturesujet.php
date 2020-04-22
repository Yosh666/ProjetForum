<?php
    $auteurs= $result["data"]["user"];
    $sujet= $result['data']['sujet'];
    $messages=$result['data']['message'];
    
 ?>
 
    <a class="cadre"href="?ctrl=forum&action=index">
        Accueil
    </a>

<?php


        echo 
        "<div class='bordure flex'>
            <div class='bordure flex-petit'>
                auteur:<br> ".$sujet->getUser()."
            </div>
            
            <div class='bordure flex-grand'>
                <h3 class= 'brune'>".$sujet->getTitre()."</h3>
                <p> écrit le: ".$sujet->getDate_publication()."</p>
            </div>
        </div>";
        if(!empty($messages)){
            foreach($messages as $message){
                echo
                "<div class='bordure flex'>
                    <div class='bordure flex-petit'>
                        <p>auteur:</p><p> ".$message->getUser()."</p>
                        <p>écrit le: ".$message->getDate_post()."</p>
                    </div>
                    <div class='bordure flex-grand'>
                        <p>".$message->getTexte()."</p>
                    </div>
                </div>";
                    
            }
        echo
            '<form 
                action="?ctrl=forum&action=newMessage&id='.$sujet->getId().'" method="post">
                
                <p class="bordure message">
                    <input type="text" name="texte"  placeholder="donne ton avis">
                </p>
                <input class="cadre" id="valid" type="submit" value="Validez!">
            </form>';
          
        
        
        }
        else{
            echo
            '<form 
                action="?ctrl=forum&action=newMessage&id='.$sujet->getId().'" method="post">
                
                <p class="bordure message">
                    <input type="text" name="texte"  placeholder="Sois le premier à écrire un message!">
                </p>
                <input class="cadre" id="valid" type="submit" value="Validez!">
            </form>';
          
        }
?>
        <!--alors ça marche pas je sais pas pourquoi donc je laisse de coté pr l'instant
        <script>
        tinymce.init({
          selector: '.message',
          plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
        });
      </script>
    -->
           



    
 