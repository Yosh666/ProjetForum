<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use  Model\Entities\Sujet;
    final class SujetManager extends Manager{


        protected $className="Model\Entities\Sujet";
        protected$tableName="sujet";
    
        public function __construct(){
            //connexion a la bdd
            parent::connect();
        }
        
    
    
    
    
    }