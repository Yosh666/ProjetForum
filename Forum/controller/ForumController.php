<?php
    namespace Controller;

    //use App\Session;
    use Model\Managers\UserManager;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;

    /**
     * cette classe gére le forum l'accueil  les sujets et messages;
     * @method index() la page d'accueil
     * @method readsubject($id)
     */
    class ForumController{
        /*new UserManager->findAll()pour voir les pseudo
        neuw SujetManager->findAll() pour voir tout les sujet

        new MessageManager->findTheFirstPost()pr afficher sous chaque sujet 
        oui obn ça on verra plus tard hein
        le premmier message posté*/


        public function index(){
            $uman= new UserManager();
            $user= $uman->findAll();
            $sman=new SujetManager();
            $sujet= $sman->findAll();
            


            return [
                "view" => VIEW_DIR."accueil.php",
                "data" => [
                    "user"=>$user,
                    "sujet"=>$sujet
                ]
            ];
        }
        public function readsubject($id){
            $uman= new UserManager();
            $user= $uman->findAll();
            $sman=new SujetManager();
            $sujet=$sman->findOneById($id);
            $mman=new MessageManager();
            $message=$mman->findBySujet($id);
            return[
                "view"=>VIEW_DIR."lecturesujet.php",
                "data"=>[
                    "user"=>$user,
                    "sujet"=>$sujet,
                    "message"=>$message
                    
                ]
            ];



        }
    
    
    
    
    }
        
