<?php
    namespace Controller;

    //use App\Session;

use App\Session;
use Model\Managers\UserManager;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;

    /**
     * cette classe gére le forum l'accueil  les sujets et messages;
     * @method index() la page d'accueil
     * @method readsubject($id)
     * @method newSubject()
     * @method newMessage($id)
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

        public function newSubject(){
            if(!empty($_POST)){
                $titre=filter_input(INPUT_POST,"titre",FILTER_SANITIZE_SPECIAL_CHARS);
                $texte=filter_input(INPUT_POST,'texte',FILTER_SANITIZE_SPECIAL_CHARS);
            
                if($titre){
                    $smanager=new SujetManager();
               
                     $sujet=[
                         'titre'=> $titre,
                         'user_id'=> Session::getUser()->getId()
                     ];
                    $idSujet=$smanager->add($sujet);

                    if($texte){
                        $messagemanager=new MessageManager();

                        $message=[
                           "texte"=>$texte,
                           "user_id"=> Session::getUser()->getId(),
                           "sujet_id"=> $idSujet
                           
                        ];
                        $messagemanager->add($message);
                    }
                    return $this-> readsubject($idSujet);
                    
                }
//jusque là rien n'est sur

                else{
                    Session::addFlash('error',"tu dois mettre un titre");
                }
            
            }            
            return[
                "view"=>VIEW_DIR."newsubject.php",
                "data"=>[
                    
                ]
            ];


        }

        public function newMessage($idSujet){
            
            if(!empty($_POST)){
                $texte=filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
                /*FILTER_UNSAFE_RAW parce qu'on va utiliser tinyMCE 
                qui du coup filtrera pr nous et aura besoin de mettre des balises HTIML*/
                $messagemanager=new MessageManager();

                $message=[
                   "texte"=>$texte,
                   "user_id"=> Session::getUser()->getId(),
                   "sujet_id"=> $idSujet
                   
                ];
                $messagemanager->add($message);
                return $this-> readsubject($idSujet);
            }
           



            return $this-> readsubject($idSujet);
        }
    
       
    
    }
        
