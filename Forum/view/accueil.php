<?php
    $auteurs= $result["data"]["user"];
    $sujets= $result['data']['sujet'];
    var_dump($sujets);
?>
<h2 class= "bleu titre" >Accueil</h2>
<?php
    if(!empty($sujets)){
        foreach($sujets as $sujet){
            echo 
            "<div class='bordure flex'>
                <div class='bordure flex-petit'>
                    auteur: ".$sujet->getUser()."
                </div>
                <div class='bordure flex-grand'>
                ".$sujet."
                </div>
            </div>";
        }
    }
?>
    