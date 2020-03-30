<?php
    namespace app;

    abstract class Manager{

        protected function connect(){
            DAO:: connect();
        }

        public function findAll(){

            $sql=" SELECT *
                    FROM".$this->tableName." a";
            
            return $this->getMultipleResults(
                DAO:: select($sql),
                $this->className
            );
        }
        
        public function findOneById($id){

            $sql ="SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.id_".$this->tableName." = :id
                    ";
            

            
        }




    }
