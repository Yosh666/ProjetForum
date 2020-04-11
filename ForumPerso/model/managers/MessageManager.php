<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use  Model\Entities\Message;

    /**
     * ce manager gére les message
     * @method findBySujet($idsujet)
     */
    final class MessageManager extends Manager{


        protected $className="Model\Entities\Message";
        protected$tableName="message";
    
        public function __construct(){
            //connexion a la bdd
            parent::connect();
        }
        
        public function findBySujet($idSujet){
            $sql = "SELECT *
                    FROM ".$this->tableName." m
                    WHERE m.sujet_id= :id
                    
                    ";
            return $this->getMultipleResults(
                DAO:: select($sql,['id'=>$idSujet]),
                $this->className
            );
        }
    
    
    
    
    }