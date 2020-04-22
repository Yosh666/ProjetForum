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
                
                <p class="bordure">
                    <input type="textarea" rows="12" name="texte"  placeholder="donne ton avis">
                </p>
                <input class="cadre" id="valid" type="submit" value="Validez!">
            </form>';
          
        
        
        }
        else{
            echo
            '<form 
                action="?ctrl=forum&action=newMessage&id='.$sujet->getId().'" method="post">
                
                <p class="bordure">
                    <input type="textarea" rows="12" name="texte"  placeholder="Sois le premier à écrire un message!">
                </p>
                <input class="cadre" id="valid" type="submit" value="Validez!">
            </form>';
          
        }
           

?>

    
 