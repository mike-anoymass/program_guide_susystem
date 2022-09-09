<?php 
    class Admin extends Dbh {

        protected function setAdmin($name, $email, $passwd){

            $sql = "INSERT INTO admin(name, email, password, created_on)
                    VALUES (?, ?, ?, NOW())";

            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$name, $email, $passwd])){
                return true;
            }else{
                return $stmt->errorInfo();
            }

        }

        protected function getAdmin($id){
            $sql = "SELECT * FROM admin WHERE email = :id";

            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute(['id'=>$id])){
                return $stmt->fetch();
            }
            return "Error Searching Admin => ". implode(":",  $stmt->errorInfo() );
        }



        protected function getAdmins(){
            $sql = "SELECT * FROM admin";
            $stmt = $this->connect()->query($sql);

            if($this->countUsers() > 0){
                return $stmt->fetchAll();
            }else{
                return false;
            }
        }

        protected function checkUserCredentials($userName, $passwd){

            $sql = "SELECT * FROM admin WHERE email = ? AND password = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$userName, $passwd]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
            return false;

        }

        protected function editUser($firstName, $lastName,$username, $phone, $email,$gender, $passwd,$tOS){
            $sql = "UPDATE users 
                    SET firstName=?, lastName=?, phone=?, email=?, gender=?, password=?, typeOfUser=?
                    WHERE username=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$firstName, $lastName, $phone, $email, $gender, $passwd,$tOS, $username]);

        }

        protected function updatePassword($username, $passwd){
            $sql = "UPDATE users SET password=? WHERE username=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([ $passwd, $username]);

            return "Editing Password => ". implode(":",  $stmt->errorInfo() );

        }

        protected function countUsers(){
            $sql = "SELECT * FROM admin";
            $stmt = $this->connect()->query($sql);
            return $stmt->rowCount();
        }

        protected function deleteUser($id){
            $sql = "DELETE FROM users WHERE username=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$id]);

        }

        protected function resetPassword($id){
            $sql = "UPDATE users SET password=? WHERE username=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$id, $id]);

            return "Password has been reset => ". implode(":",  $stmt->errorInfo() );

        }



    }
?>