

<h2 class="bleu titre">Inscription</h2>
<p class="bleu">
    <?= App\Session::getFlash('process'); ?>
</p>

<div class="cadre">
    <form action="index.php?ctrl=connexion&action=subscribe" method="post">
        
        <p>
            <input id="mail" type="mail" name="mail" placeholder="Votre mail" >
        </p>
        <p>
            <input id="pseudo" type='text' name="pseudo" placeholder="Pseudo" >
        </p>
        <p>
            <input id="password" type="text" name="password" placeholder="Entrez le mot de passe" >
        </p>
        <p>
            <input id="password-repeat" type="text" name="password-repeat" placeholder="Répétez le mot de passe" >
        </p>
        <p>
            <input id="valid" type="submit" value="Connexion">
        </p>
        
    </form>
    <a href="?ctrl=connexion&action=login">Déja inscrit? Cliquez ici!</a>
</div>