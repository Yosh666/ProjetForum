<?php
    namespace Controller;

    use App\Session;
    use Model\Managers\UserManager;
    
/**
 * cette class va permettre de gérer la connexion et l'inscription d'un utlisateur
 * @method index()
 * @method login()
 * @method logout();
 * @method subscribe()
 */
    class ConnexionController{
        
        /**
         * cette fction renverra vers la connexion au forum
         */
        public function index(){
            return $this->login();
        }

        /**
         * cette fonction va permettre de se connecter au forum
         */
        public function login(){
            if(!empty($_POST)){
                $pseudo=filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_SPECIAL_CHARS);
                //evite les caracteres spéciaux et les lignes de codes
                $password=filter_input(INPUT_POST,'password',FILTER_VALIDATE_REGEXP,
                //permet de calibrer le password au format qu'on veut (nbre de lettre présence obligatoire de chiffre....)
                
                    array(
                        "options"=> array("regexp"=>'/[a-zA-Z0-9]/')
                        //la j'ai juste autorisé les caracteres normaux et chiffres de 0 à 9
                        )
                    );
                $manager=new UserManager();
                if(in_array(1,$manager->checkUserValidate($pseudo))){
                    if(in_array(1,$manager->retrievePassword($pseudo,$password))){
                        $user=$manager->findOneByUserName($pseudo);
                        Session:: setUser($user);
                        header('Location:index.php?ctrl=forum');  
                         Session::addFlash('success','Bienvenue! '.$pseudo); 
                         die();                     
                           
                    }
                    else {
                        Session:: addFlash('error','mauvais mot de passe');
                    }

                }
                else{
                    header('Location:index.php?ctrl=connexion&action=subscribe');
                    Session::addFlash('error','Pas encore inscrit? On peut y remédier maintenant!');
                    die();
                }
            
            }
            return [
                "view" => VIEW_DIR."connexion.php",
                "data" => [
                ]
            ];
        }

        
        /**
         * cette méthode permet à l'user de se déconnecter et ça renvoie sur l'écran de connexion
         */
        public function logout(){
            Session::setUser(null);
            header('Location:?ctrl=connexion');
            Session::addFlash('process','ByebYe reviens quand tu veux!');
            die();
        }

        /***
         * cette fonction va permettre de s'incrire puis être renvoyé à la page de connexion 
         */
        public function subscribe(){
            if(!empty($_POST)){
                $pseudo=filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_SPECIAL_CHARS);
                //evite les caracteres spéciaux et les lignes de codes

                $mail=filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
                //verifie qu'il y a un @tout ça on peut aussi le fr en regexp

                $password=filter_input(INPUT_POST,'password',FILTER_VALIDATE_REGEXP,
                //permet de calibrer le password au format qu'on veut (nbre de lettre présence obligatoire de chiffre....)
                
                    array(
                        "options"=> array("regexp"=>'/[a-zA-Z0-9]/')
                        //la j'ai juste autorisé les caracteres normaux et chiffres de 0 à 9
                        )
                    );
                $passwordrepeat=filter_input(INPUT_POST,'password-repeat',FILTER_SANITIZE_STRING);
                // celui la c'est un kazoo
                if($pseudo && $mail){
                //si le peudo et le mail existe dans le form et respecte le filter input 
                //on met ça la pr les message d'erreur dans les différents else
                    if($password){
                        if($password===$passwordrepeat){
                            $manager=new UserManager();
                            if(in_array(0,$manager->checkUserExists($mail,$pseudo) ) ){
                                /*le in_array ici permet justement de voir que le checkUserexist = 0*/
                                
                                $user=[
                                    'pseudo'=> $pseudo,
                                    'mail'=> $mail,
                                    'password'=> $password
                                    
//on fera le password_hash en argon2 plus tard

                                ];
                                $manager->add($user);
                                
                                header('Location:index.php?ctrl=connexion&action=login');
                           
                                Session::addFlash('process','Bienvenue! Vous y êtes presque!'); 
                                die();
                                
                            }
                            else{
                                Session :: addFlash('error','Ce compte existe déja');
                            }
                            
                        }
                        else{
                            Session::addFlash('error','les mots de passe ne correspondent pas');
                        }
                    }
                    else{
                        Session::addFlash('error', 'ben vazy mets un mot de passe quoi');
                    }
                }
                else{
                    Session::addFlash('error','Il faut remplir TOUT les champs!');
                }
            
            
            }
            

        return [
                "view" => VIEW_DIR."inscription.php",
                "data" => [
                ]
            ];

        }
      
    
    
    
    }