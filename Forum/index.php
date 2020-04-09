<?php
//index.php est la racine de tout
//c lui qui initie les namespaces
//lui qui crée les constantes globalles de toute l'appli
//C'est Lui l'Alpha et l'Oméga de l'appli


    namespace App;/*si on met pas de namespace ici on peut pas autoloader 
    parce que c'est index.php qui initie les namespace*/



        define('DS',DIRECTORY_SEPARATOR);
        // ça serait pour dire / ou \ selon les différents systémes c pas le même la on est sur de la portabilité

        /* la constante BASE_Dir  donne le dossier source(racine) de l'app là ou se trouve index.php*/
        define('BASE_DIR',dirname(__FILE__).DS);
        // donc cette définition va nous donner 

        define('VIEW_DIR',BASE_DIR."view/");//le chemin ou se trouve les vues 
        define('PUBLIC_DIR',BASE_DIR."public/");// le chemin ou se trouvent les fichiers genre css images tout ça

        require("app/Autoloader.php");

        Autoloader::register();
        
        //démarre une session ou récupère la session actuelle
        session_start();
        //fonciton native de php

        //et la on intégre la classe Session pour pouvoir gérer les messages de manières personnalisées
        use App\Session as Session;

//interception de requête http


        if (isset($_GET['ctrl'])){
            $ctrlname=$_GET['ctrl'];
        //si on chope un 'ctrl' on va en afficher l'url sinon de base on passera par le connexion controller
        }
        else $ctrlname ="connexion";

        $ctrlname= "Controller".DS.ucfirst($ctrlname)."Controller";

        $ctrl = new $ctrlname();
        if (isset($_GET['action'])){
            $action = $_GET['action'];
        //si con chope une action on l'inscrit dans l'url
        }
        //sinon de base action=index
/*-!-!-!-!-!-! attention -!-!-!-!
        ça veut dire qu'il faut un index() dans TOUT les controllers!!!*/
        else $action ="index";
        
        if (isset($_GET['id'])){
            $id=$_GET['id'];
        }
        else $id=null;

        $result =$ctrl->$action($id);
// l'url par defaut c'est: index.php?ctrl=connexion&action=index&id=null


/*ici on va charger le layout avant la page view 
ds le layout ya juste le titre ptet je mettrais un logo et un footer*/
//alors ici normalement ya un délire avec ajax mais bon pr l'instant j'ai pas compris ça non plus

        ob_start();//native php démarre un buffer (tampon de sortie)

        include($result['view']);
        //la vue va s'afficher dans le buffer qui s'insérera ds la template du layout

        $page= ob_get_contents();
        // la variable $page (qui est au milieu du layout) va récupérer le "include ($result['view']) qui est dans le buffer

        ob_end_clean();
        //j'efface le tampon maintenant que j'ai récupéré ma view;

        include VIEW_DIR."layout.php";
        //jaffiche la template principale et $page se chargera dedans
