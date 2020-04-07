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
        

        /*findAll()
        findOneById()
        sont dans le parents et on n'a pas la nécessité de les écrire ici*/    
    
    }
