<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $pseudo;
        private $mail;
        //private $password;


        private $date_inscription;

//voir si on peut virer les set et certains get ou doit on les mettre en protected        
        private $role;

        public function __construct($data){
            $this->hydrate($data);
        }    



        /**
         * Get the value of date_inscription
         */ 
        public function getDate_inscription()
        {
                return $this->date_inscription;
        }

        /**
         * Set the value of date_inscription
         *
         * @return  self
         */ 
        public function setDate_inscription($date_inscription)
        {
                $this->date_inscription = $date_inscription;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        protected function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
                return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
                $this->pseudo = $pseudo;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;

        }

        /**
         * Get the value of password
         */ 
        /*public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
       /* public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }*/

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }
        

    }

        
