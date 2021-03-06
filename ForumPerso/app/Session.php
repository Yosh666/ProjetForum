<?php
    namespace App;


    /**
     * cette méthode permet d'en,voyer des messages  et de démarrer des sessions
     * @method static addFlash($categ,$msg) ajoute un message
     * @method static getFlash($categ) renvoie le message de la catégorie ciblé s'il yen a
     */
    class Session{

        /**
         * ajoute un message en session ds la catégorie $categ (Error, Succes etc etc)
         */
        public static function addFlash($categ,$msg){
            //il y a plusieurs categ possible forcément dans un []
            $_SESSION[$categ] = $msg;
            //$_SESSION variable native de php
        }

        /**
         * renvoie un message de la cétégorie categ si il yen a ds le layout
         */
        public static function getFlash($categ){

            //pr éviter que le message d'erreur reste affiché aprés correction
            if(isset($_SESSION [$categ])){
               
                $msg=$_SESSION[$categ];
                unset($_SESSION[$categ]);
            }
            else $msg="";
            //pr avoir un espace vide ds le layout

            return $msg;
        }

        /**
         * cette methode va maintenir un user connecté en le mettant dans la session
         * 
         */
        public static function setUser($user){
            if(!isset($_SESSION['user'])){
                $_SESSION['user']=$user;
                return true;
            }
            return false;
        }

        public static function getUser(){

            return (isset($_SESSION['user']))?$_SESSION['user']:false;
            /*si $_SESSION['user'] est rempli 
            alors return le tableau remplit des data de l'user de la session
            sinon retourner false (donc pas eu de login valide)
            */

        }
    }