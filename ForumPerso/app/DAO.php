<?php
    namespace App;



/**
     * Classe abstraite d'accés aux données de la BDD
     * @property static $bdd l'instance unique de PDO que la classe stockera lorsque connect() sera appelé
     * 
     * @method static connect() connexion à la BDD
     * @method static insert() requêtes d'injection dans la BDD
     * @method static select() requêtes de sélection dans la BDD
     * @method static update($sql,$params)
     * 
     */
    abstract class DAO{

        private static $host= 'mysql:host=localhost;port=3306';
        private static $dbname= 'forum';
        private static $dbuser='root';
        private static $dbpass='';
        private static $bdd;

        /**
         * Cette method permet de créer l'unique instancer PDO de l'application et de se connecter a la BDD
         * 
         */
        public static function connect(){

            self::$bdd= new \PDO(

                self:: $host.';dbname='.self:: $dbname,

                self::$dbuser,
                self:: $dbpass,
                array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                    \PDO::ATTR_ERRMODE=> \PDO::ERRMODE_EXCEPTION,
                    \PDO:: ATTR_DEFAULT_FETCH_MODE => \PDO:: FETCH_ASSOC
                )
            );
        }

        /**
         * cette méthode permet les requêtes de type INSERT 
         * return true en cas de succés 
         * message en cas d'errreur
         */
        public static function insert($sql){

            try{
                $statement= self::$bdd->prepare($sql);
                $result = $statement-> execute();//execute()native de PDO

               /* $statement->closeCursor();
                return $result;*/
                return self::$bdd->lastInsertId();
                

            }
//anteslash comme pr PDO et comme pr toute les classes natives de php
           catch (\Exception $e){
                echo $e->getMessage();
            }
        }

        /**
         * Cette méthod permet les requêtes de type SELECT
         * 
         */
        public static function select($sql,$params=null,bool $multiple=true):?array {

            try{
                $statement= self::$bdd->prepare($sql);//prepare()native de PDO
                $statement->execute($params);
                /*le $params permet de cibler la requête 
                (équivalent du WHERE quoi) vu que manager fait un SELECT * FROM table*/
                if($multiple){
                    $results= $statement->fetchAll();//fetchAll() native de PDO
                    if(count($results)==1){
                        $results = $results[0];
                    }
                }
                else {
                    $results= $statement->fetch();
                }
                $statement->closeCursor();
                return($results == false)? null : $results;
                /*si $results == false  alors null sinon $results
                car on cherche des $params = null et pas false sinon ça pertube le game tu vois
                les managers veulent des $result ou des "null" pas des falses*/
            }
            catch(\Exception $e){
                echo $e->getMessage();
            }
        }


        /***
         * cette methode permet d'effectuer les requete de type update
         */
        public static function update($sql, $params){
            try{
                $stmt = self::$bdd->prepare($sql);
                
                //on renvoie l'état du statement après exécution (true ou false)
                return $stmt->execute($params);
                
            }
            catch(\Exception $e){
                
                echo $e->getMessage();
            }
        }
    }