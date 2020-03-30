<?php
    namespace app;
    /**
     * cette classe abstraite permet de préparer l'hydratation qui sera personnalisé en héritage
     */
    abstract class Entity{

        /**
         * cette méthode va servir à hydrater les objets depuis la BDD
         * @method hydrate($data) retourne un objet contenant un tableau associatif
         * 
         */
        protected function hydrate($data){
            foreach ($data as $field => $value){
                
                //field= sujet_id
                // fieldarray = ['sujet','id'] c'est rapport au clés étrangère tout ça
                $fieldArray= explode("_", $field);

                if(isset($fieldArray[1])&& $fieldArray[1]=="id"){
                /*si les data sont une clé étrangère (id en position [1] aprés explode) 
                alors on va créer un manager correspondant a la clé étrangère*/
                    $manName = ucfirst($fielarray[0])."Manager";
                    $FQCName ="model\managers".DS.$manName;

                    $man= new $FQCName();
                    $value = $man->findOneById ($value);
                }
                /*on va setter dans chaque objet les données
                nom=>Audrey
                pseudo=>Yosh*/
                $method= 'set'.ucfirst($fielarray[0]);
                if (method_exists($this, $method)){
                    $this->$method ($value);
                }                
            }
        }      
        
        public function getClass(){
            return get_class($this);
        }


    }