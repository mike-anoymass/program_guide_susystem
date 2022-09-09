<?php
    class PS extends Dbh{
        protected function insert($programID , $subjectID, $gradeID){
            $sql = "INSERT INTO program_subjects (subject, program, weight, created_on)
                    VALUES (? , ?, ?, NOW())";
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$subjectID, $programID, $gradeID])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function get($programID){
            $sql = "SELECT ps.id AS psID , s.name AS subjectName, weight, ps.created_on AS date  
                     FROM program_subjects ps INNER JOIN subjects s ON ps.subject=s.id 
                     WHERE program=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$programID]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else{
                return false;
            }

        }

        protected function getC($programID){
            $sql = "SELECT s.name AS subjectName, weight
                     FROM program_subjects ps INNER JOIN subjects s ON ps.subject=s.id 
                     WHERE program=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$programID]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else{
                return false;
            }

        }

        protected function checkExistence($programID, $subjectID){
            $sql = "SELECT *
                     FROM program_subjects 
                     WHERE program=? and subject=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$programID, $subjectID]);

            if( $stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }

        protected function delete($id){
            $sql = "DELETE FROM program_subjects WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting program => ". implode(":",  $stmt->errorInfo() );
        }
    }
?>