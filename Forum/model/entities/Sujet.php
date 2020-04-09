<?php
    namespace Model\Entities;

    use App\Entity;

    final class Sujet extends Entity{

        private $id;
        private $titre;
        private $date_publication;
        private $user;




        public function __toString()
        {
                return "<p class= 'bleu'>".$this->titre."</p>
                        <p> ajouté le: ".$this->date_publication."</p>";
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
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of date_publication
         */ 
        public function getDate_publication()
        {
                return $this->date_publication;
        }

        /**
         * Set the value of date_publication
         *
         * @return  self
         */ 
        public function setDate_publication($date_publication)
        {
                $this->date_publication = $date_publication;

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
