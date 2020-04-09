<?php
    $auteurs= $result["data"]["user"];
    $sujets= $result['data']['sujet'];
    $messages=$result['data']['message'];
 ?>
 
    <a class="cadre"href="?ctrl=forum&action=index">
        Accueil
    </a>

<?php

if(!empty($sujets)){
    foreach($sujets as $sujet){
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

        }
        else{
            echo 
                "<div class='bordure'>
                    Soyez le premier à écrire un message!
                </div>";
        }
    }
}
?>
 