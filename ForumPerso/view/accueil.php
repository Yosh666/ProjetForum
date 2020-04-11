<?php
    $auteurs= $result["data"]["user"];
    $sujets= $result['data']['sujet'];
    
?>
<h2 class= "bleu titre" >Accueil</h2>
<?php
    if(!empty($sujets)){
        foreach($sujets as $sujet){
            echo 
            "<div class='bordure flex'>
                <div class='bordure flex-petit'>
                    auteur:<br> ".$sujet->getUser()."
                </div>
               
                <div class='bordure flex-grand'>
                    <a href='?ctrl=forum&action=readsubject&id=".$sujet->getId()."'>
                        <h3 class= 'brune'>".$sujet->getTitre()."</h3>
                        <p> écrit le: ".$sujet->getDate_publication()."</p>
                    </a>
                </div>
                
            </div>";
        }
    }
    
?>
<div class="bordure">
    <a href='?ctrl=forum&action=newsubject'>
        <h3 class="brune">
            Ecris un nouveau sujet à partager avec la communauté!
        </h3>
    </a>
</div>