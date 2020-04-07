<?php

    namespace App;

    /**
     * Cette classe va servir à autoloader les classes nécessaires avec l'utilisation de namespace
     * @method static autoload($class)
     */
    class Autoloader{

        public static function register(){
            spl_autoload_register(array(__CLASS__,'autoload'));
        }


        /**
         * cette method va servir à autoloader les classes nécessaires
         * 
         */
        public static function autoload($class){
        /*$class doit être en FullyQualifiedClassName (FQCName)
        exemple = model\managers\nom de la classe = UserManager*/


            //on explose $class par \
            $parts = preg_split('#\\\#',$class);
            //$parts= ['model','managers','UserManager']

            // array_pop récupére le dernier élément du tableau et le retire de ce tableau
            $className= array_pop($parts);
            //$className= UserManager
        
            /*$path va créer le chemin vers la classe en mettant un DS entre chaque partie du tableau de $parts
            sauf le dernier élément de l'array qui a été retiré par array_pop*/
            $path = strtolower(implode(DS, $parts));
            //$path='model/managers'

            $file = $className.'.php';
            //$file=UserManager.php

            // ici on n'a donc le chemin du dossier créer par l'autoloader
            $filepath =BASE_DIR.$path.DS.$file;
            //$filepath=model/managers/UserManager.php

            if(file_exists($filepath)){
                require $filepath;
            /*si le fichier existe on fait le require ici 
            c'est pr ça qu'on utilise "use" par la suite 
            c'est l'autoloader qui s'occupera des require*/  
            }      
        }
    }