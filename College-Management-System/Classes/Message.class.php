<?php
    class Message extends Dbh{
        protected function insert($studentID , $subject, $body){
            $sql = "INSERT INTO questions (student,subject, body, created_on)
                    VALUES (? , ?, ? ,  NOW())";
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$studentID, $subject, $body])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function getMessages(){
            $sql = "SELECT q.id AS messageID, subject, body, status, firstname,
                     middlename, lastname, q.created_on dateCreated 
                     FROM questions q INNER JOIN students s ON q.student=s.id order by q.id desc";
            $stmt = $this->connect()->query($sql);

            if($this->countMessages() > 0){
                return $stmt->fetchAll();
            }

            return false;

        }

        protected function getMessagesFor($studentID){
            $sql = "SELECT q.id AS messageID, response, replied_on, subject, body, status, firstname,
                     middlename, lastname, q.created_on dateCreated 
                     FROM questions q INNER JOIN students s ON q.student=s.id 
                     where student = ?";

           $stmt = $this->connect()->prepare($sql);
           $stmt->execute([$studentID]);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }

            return false;

        }

        protected function getMessage($id){
            $sql = "SELECT q.id AS messageID, subject, body, status, firstname,
                     middlename, lastname, q.created_on dateCreated, response 
                     FROM questions q INNER JOIN students s ON q.student=s.id 
                     where q.id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }

            return false;

        }

        


        protected function getMessagesForThisStudent($student){
            $sql = "SELECT SELECT q.id AS messageID, subject, body, response,
                     status, name, q.replied_on dateReplied
                     FROM questions q INNER JOIN admin a ON q.admin=a.id
                     WHERE q.student=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$student]);

            if( $stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else{
                return false;
            }
        }

        protected function editResponse($id , $response, $admin){
            $sql = "UPDATE questions SET response=?, status=?, replied_on=NOW(), admin=? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$response, true, $admin, $id]);
            return true;
        }

        protected function deleteMessage($id){
            $sql = "DELETE FROM questions WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Message => ". implode(":",  $stmt->errorInfo() );
        }

        protected function countMessages(){
            $sql = "SELECT * FROM questions";
            $stmt = $this->connect()->query($sql);
            return $stmt->rowCount();
        }
    }
?>