<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use  Model\Entities\Message;
    final class MessageManager extends Manager{


        protected $className="Model\Entities\Message";
        protected$tableName="message";
    
        public function __construct(){
            //connexion a la bdd
            parent::connect();
        }
        
    
    
    
    
    }