<?php
    class SS extends Dbh{
        protected function insert($studentID , $subjectID, $gradeID){
            $sql = "INSERT INTO students_subjects (subject, student, weight, created_on)
                    VALUES (? , ?, ?, NOW())";
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$subjectID, $studentID, $gradeID])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function get($studentID){
            $sql = "SELECT ps.id AS psID , s.name AS subjectName, weight, ps.created_on AS date  
                     FROM students_subjects ps INNER JOIN subjects s ON ps.subject=s.id 
                     WHERE student=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$studentID]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else{
                return false;
            }

        }

        protected function getC($studentID){
            $sql = "SELECT s.name AS subjectName, weight 
                     FROM students_subjects ps INNER JOIN subjects s ON ps.subject=s.id 
                     WHERE student=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$studentID]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else{
                return false;
            }

        }

        protected function checkExistence($studentID, $subjectID){
            $sql = "SELECT *
                     FROM students_subjects 
                     WHERE student=? and subject=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$studentID, $subjectID]);

            if( $stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }

        protected function delete($id){
            $sql = "DELETE FROM students_subjects WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting => ". implode(":",  $stmt->errorInfo() );
        }
    }
?>