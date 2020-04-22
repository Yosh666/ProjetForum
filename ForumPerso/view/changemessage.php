<a class="cadre"href="?ctrl=forum&action=index">
        Accueil
</a>
<?php
    /*$auteur= $result["data"]["user"];
    $sujet= $result['data']['sujet'];*/
    $message=$result['data']['message'];
    var_dump($message->getSujet()->getId());
echo" 
 
<form  action='?ctrl=forum&action=changeMessage&id=".$message->getId()."i method='post'>
    <p class='bordure'>
        <input type='textarea' name='newtexte' value='".$message->getTexte()."' required>
    </p>
    
    <input class='cadre' id='valid' type='submit' value='Modifiez'>
</form>";
 ?>   
