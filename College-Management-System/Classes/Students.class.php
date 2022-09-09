<?php
    class Students extends Dbh{
        protected function setStudent($firstname, $middlename, $lastname, $gender,
         $address, $phone, $username, $msce_year, $msce_school, $password){

            $sql = "INSERT INTO students 
                    (firstname, middlename, lastname, gender, address, phone,
                    username, msce_year, msce_school, password, created_on) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())"; 
   
            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$firstname, $middlename, $lastname, $gender,
            $address, $phone, $username, $msce_year, $msce_school, $password])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function getAll(){
            $sql = "SELECT * FROM students order by id desc";
            $stmt = $this->connect()->query($sql);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }

            return false;
        }

        protected function checkUserCredentials($userName, $passwd){

            $sql = "SELECT * FROM students WHERE username = ? AND password = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$userName, $passwd]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
            return false;

        }

        protected function delete($id){
            $sql = "DELETE FROM students WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting students => ". implode(":",  $stmt->errorInfo() );
        }

        protected function get($id){
            $sql = "SELECT *  from students where id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            
            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
            return false;
        }

        protected function edit($id , $name, $phone, $password){
            $sql = "UPDATE students SET username=?, phone=?, password=? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $phone, $password, $id]);
            return true;
        }

    }
?>