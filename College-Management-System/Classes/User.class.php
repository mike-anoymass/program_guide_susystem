<?php
    class User extends Dbh{
        protected function get($id){
            $sql = "SELECT *  from admin where id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            
            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
            return false;
        }

        protected function edit($id , $name, $email, $password){
            $sql = "UPDATE admin SET name=?, email=?, password=? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $email, $password, $id]);
            return true;
        }
    }
?>