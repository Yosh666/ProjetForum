<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use  Model\Entities\Message;

    /**
     * ce manager gére les message
     * @method findBySujet($idsujet)
     * @method updateMessage($idMessage,$newtexte)
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
    

        public function updateMessage($idMessage, $newtexte){

            $sql = "UPDATE ".$this->tableName." SET text = :newtexte WHERE id_message = :id";

            return DAO::update($sql, ['newtexte' => $newtexte, 'id' => $idMessage]);

        }

    
    
    
    }