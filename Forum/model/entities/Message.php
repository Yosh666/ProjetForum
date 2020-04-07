<?php
    namespace Model\Entities;

    use App\Entity;

    final class Message extends Entity{
    
        private $id;
        private $texte;
        private $date_post;
        private $sujet;
        private $user;
     
       
    
    
    

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
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of texte
         */ 
        public function getTexte()
        {
                return $this->texte;
        }

        /**
         * Set the value of texte
         *
         * @return  self
         */ 
        public function setTexte($texte)
        {
                $this->texte = $texte;

                return $this;
        }

        /**
         * Get the value of date_post
         */ 
        public function getDate_post()
        {
                return $this->date_post;
        }

        /**
         * Set the value of date_post
         *
         * @return  self
         */ 
        public function setDate_post($date_post)
        {
                $this->date_post = $date_post;

                return $this;
        }

        /**
         * Get the value of sujet
         */ 
        public function getSujet()
        {
                return $this->sujet;
        }

        /**
         * Set the value of sujet
         *
         * @return  self
         */ 
        public function setSujet($sujet)
        {
                $this->sujet = $sujet;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }
    }