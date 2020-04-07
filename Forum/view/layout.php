<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Eater&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Eater&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/CSS/style.css">
    <title>Nique ton pangolin</title>
</head>
<body>
<!--
/*ici on a le cadre dans lequel s'inscriront les pages 
du coup faudra fr le css tout ça*/
-->
    <div id='wraper'>
        <div id='mainpage'>
<!--
/*ici on va mettre les messages d'erreurs (getFlash()) de session*/
//session a faire!
-->
            <h3 id='message' style="color: red">
                <?= App\Session::getFlash("error")
                //message d'erreur ?>
            </h3> 
            <h3 id="message" style= "color:green">
            <?= App\Session:: getFlash("success")?>
            </h3>

            <header>
                <img src="./public/img/pangolin.jpg" alt="pango" id="logo">
                <h1 class="bleu">
                    AUX SURVIVALISTES GOURMETS
                </h1>
                
            </header>

            <main id='forumconnecte'>

                <?= $page ?>
            
            </main>   
            <footer>
                <p>
                    la dépression cette ennemi du confinement vazy paye ta solitude avec des gifs de chats....
                </p>
            </footer>      
        
        </div>


    </div>   



</body>
</html>