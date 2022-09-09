<?php
    class Program extends Dbh{
        protected function insert($code , $name, $faculty){
            $sql = "INSERT INTO programs (code, name, faculty, created_on)
                    VALUES (? , ?, ?, NOW())";
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$code, $name, $faculty])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function getAll(){
            $sql = "SELECT p.id AS programID,code, p.name AS programName, f.name AS facultyName, p.created_on AS date
                     FROM programs p INNER JOIN faculty f ON p.faculty=f.id ";
            $stmt = $this->connect()->query($sql);

            if($this->countPrograms() > 0){
                return $stmt->fetchAll();
            }

            return false;

        }

        protected function get($id){
            $sql = "SELECT * FROM programs WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetch();
            }else{
                return false;
            }
        }

        protected function getProgram($id){
            $in = join(',', array_fill(0, count($id), '?'));
            $sql = "SELECT p.id AS programID,code, p.name AS programName, f.name AS facultyName, p.created_on AS date
                     FROM programs p INNER JOIN faculty f ON p.faculty=f.id
                     where p.id IN ($in)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($id);

            if( $stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else{
                return false;
            }
        }

        protected function edit($id , $code , $name, $faculty){
            $sql = "UPDATE programs SET code=?, name=?, faculty=? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$code , $name, $faculty, $id]);
            return "Updating Program => ". implode(":",  $stmt->errorInfo() );
        }

        protected function delete($id){
            $sql = "DELETE FROM programs WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting program => ". implode(":",  $stmt->errorInfo() );
        }

        protected function countPrograms(){
            $sql = "SELECT * FROM faculty";
            $stmt = $this->connect()->query($sql);
            return $stmt->rowCount();
        }
    }
?>