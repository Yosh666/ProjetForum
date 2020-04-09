<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use  Model\Entities\User;


    final class UserManager extends Manager{


        protected $className="Model\Entities\User";
        protected$tableName="user";

        public function __construct(){
            //connexion a la bdd
            parent::connect();
        }
        
        public function checkUserExists($mail,$pseudo){
            $sql= "SELECT COUNT(id_user)
                FROM ".$this->tableName." u 
                WHERE u.mail = :mail 
                OR u.pseudo = :pseudo"
                ;
                return DAO::select($sql,['mail'=>$mail,'pseudo'=>$pseudo]);

        }
        public function checkUserValidate($pseudo){
            $sql="SELECT COUNT(id_user)
                FROM ".$this->tableName." u 
                WHERE u.pseudo = :pseudo"
                ;
                return DAO::select($sql,['pseudo'=>$pseudo]);
        }
        public function retrievePassword($pseudo,$password){
            $sql="SELECT COUNT(id_user)
                FROM ".$this->tableName." u
                WHERE u.pseudo= :pseudo 
                AND u.password= :password"
                ;
                return DAO::select($sql,['pseudo'=>$pseudo,"password"=>$password]);
        }
        public function findOneByUserName($pseudo){

            $sql ="SELECT *
                    FROM ".$this->tableName." u           
                    WHERE u.pseudo = :pseudo 
                    ";
            
            return $this->getOneOrNullResult(
                DAO:: select($sql,['pseudo'=> $pseudo], false),/*le false est pr les argument de la fonction DAO:: select() ou multiple= true par défaut
                dans DAO si l'argument multiple est à false ça lance un fetch() et pas un fetchAll()*/
                $this->className
            );            
        }

        /*findAll()
        findOneById()
        sont dans le parents et on n'a pas la nécessité de les écrire ici*/    
    
    }
