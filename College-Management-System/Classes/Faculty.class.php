<?php
    class Faculty extends Dbh{
        protected function insert($name , $description){
            $sql = "INSERT INTO faculty (name,description, created_on)
                    VALUES (? , ?, NOW())";
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$name, $description])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function getFaculties(){
            $sql = "SELECT * FROM faculty";
            $stmt = $this->connect()->query($sql);

            if($this->countFaculties() > 0){
                return $stmt->fetchAll();
            }

            return false;

        }

        protected function getFaculty($id){
            $sql = "SELECT * FROM faculty WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetch();
            }else{
                return false;
            }
        }

        protected function editFaculty($id , $name , $description){
            $sql = "UPDATE faculty SET name=?, description=? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $description, $id]);
            return "Updating faculty => ". implode(":",  $stmt->errorInfo() );
        }

        protected function deleteFaculty($id){
            $sql = "DELETE FROM faculty WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Faculty => ". implode(":",  $stmt->errorInfo() );
        }

        protected function countFaculties(){
            $sql = "SELECT * FROM faculty";
            $stmt = $this->connect()->query($sql);
            return $stmt->rowCount();
        }
    }
?>