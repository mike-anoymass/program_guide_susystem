<?php
    class Subject extends Dbh{
        protected function insert($name , $description){
            $sql = "INSERT INTO subjects (name,description, created_on)
                    VALUES (? , ?, NOW())";
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$name, $description])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function getSubjects(){
            $sql = "SELECT * FROM subjects";
            $stmt = $this->connect()->query($sql);

            if($this->countSubjects() > 0){
                return $stmt->fetchAll();
            }

            return false;

        }

        protected function getSubject($id){
            $sql = "SELECT * FROM subjects WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetch();
            }else{
                return false;
            }
        }

        protected function editSubject($id , $name , $description){
            $sql = "UPDATE subjects SET name=?, description=? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $description, $id]);
            return "Updating subjects => ". implode(":",  $stmt->errorInfo() );
        }

        protected function deleteSuject($id){
            $sql = "DELETE FROM subjects WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Subjects => ". implode(":",  $stmt->errorInfo() );
        }

        protected function countSubjects(){
            $sql = "SELECT * FROM faculty";
            $stmt = $this->connect()->query($sql);
            return $stmt->rowCount();
        }
    }
?>