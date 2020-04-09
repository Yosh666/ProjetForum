<?php
    namespace App;


    /**
     * cette class abstraite permet de gérer l'interaction manager BDD
     * @method protected connect()
     * @method findAll()
     * @method findOneById()
     * @method add($data)
     * @method protected getMultipleResults($rows,$class)
     * @method protected getOneOrNullResult($row,$class)
     */
    abstract class Manager{

        /**
         * cette méthode protected va permettre de se connecter à la bdd
         */
        protected function connect(){
            DAO:: connect();
        }

        /**
         * cette méthode va permettre de récupérer tout les enregistrement hydratés en objets de la classmanager ciblé
         * @return array d'objets de la class ciblée(appelée collection)
         * 
         */
        public function findAll(){

            $sql=" SELECT *
                    FROM ".$this->tableName." a";
            
            return $this->getMultipleResults(
                DAO:: select($sql),//equivalent $rows de la fct° getMultipleResults
                $this->className//equivalent $class de la fct° getMultipleResults
            );
        }
        protected function getMultipleResults($rows, $class){

            $objects=[];//renvoie sous forme d'un tableau d'objets appelée aussi une collection

            if(!empty($rows)){
                foreach ($rows as $row){
                    $objects[] =new $class($row);/*a ce moment la ce qu'il y a dans rows est déja un tableau php avec les données de la bDD récupérées
                    le "new $class" étant le moment ou on va envoyer hydrater l'objet dans entities pour en fr un tableau associatif
                    [id=>1, pseudo=>yosh....]*/
                }
            }

            return $objects;
            
        }
        
        
        /**
         * cette méthode permet de renvoyer les enregistrement hydratés en un seul objet de la classmanager ciblé ou aucun résultat
         * @return objet hydraté de la classManager et l'id ciblées
         * @return false en cas d'absence dans la bdd de l'id demandée
         */

        public function findOneById($id){

            $sql ="SELECT *
                    FROM ".$this->tableName." a           
                    WHERE a.id_".$this->tableName." = :id 
                    ";
            
            return $this->getOneOrNullResult(
                DAO:: select($sql,['id'=> $id], false),/*le false est pr les argument de la fonction DAO:: select() ou multiple= true par défaut
                dans DAO si l'argument multiple est à false ça lance un fetch() et pas un fetchAll()*/
                $this->className
            );            
        }
        protected function getOneOrNullResult ($row, $class){

            if($row != null){
                // si l'id est valable on a dans $row  les données de la BDD pour le champ id=1 par exemple
               return new $class($row);// on hydrate un objet de la class ciblée dans entities pour en fr un tableau associatif
            }
            return false;// si l'id n'existe pas dans la BDD
        }

        /**
         * cette méthode permet d'ajouter de nouvelles données à la bdd
         * @return True ou message d'erreur
         */
        public function add($data){ //$data est sous forme de tableau associatif [mail=>2@vroum.com, pseudo=>Anne....]
            $keys=array_keys($data);
            $values =array_values($data);
            $sql = "INSERT INTO ".$this->tableName."
                    (".implode(',',$keys).")
                     VALUES
                    ('".implode(",",$values). "')";


            return DAO::insert($sql);
        }    
    }
