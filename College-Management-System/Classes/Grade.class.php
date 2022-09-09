<?php
    class Grade extends Dbh{
        protected function insert($weight , $description){
            $sql = "INSERT INTO grade_weights (weight_number, description, created_on)
                    VALUES (? , ?, NOW())";
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$weight, $description])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function getAll(){
            $sql = "SELECT * FROM grade_weights";
            $stmt = $this->connect()->query($sql);

            if($this->countGrades() > 0){
                return $stmt->fetchAll();
            }

            return false;

        }

        protected function get($id){
            $sql = "SELECT * FROM grade_weights WHERE weight_number=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetch();
            }else{
                return false;
            }
        }


        protected function delete($id){
            $sql = "DELETE FROM grade_weights WHERE weight_number=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Subjects => ". implode(":",  $stmt->errorInfo() );
        }

        protected function countGrades(){
            $sql = "SELECT * FROM grade_weights";
            $stmt = $this->connect()->query($sql);
            return $stmt->rowCount();
        }
    }
?>