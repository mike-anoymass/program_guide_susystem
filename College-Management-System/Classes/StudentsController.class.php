<?php
    class StudentsController extends Students {

       public function setStudent($firstname, $middlename, $lastname, $gender,
       $address, $phone, $username, $msce_year, $msce_school, $password)
       {
           return parent::setStudent($firstname, $middlename, $lastname, $gender,
           $address, $phone, $username, $msce_year, $msce_school, $password); // TODO: Change the autogenerated stub
       }

       public function delete($id){
            return parent::delete($id);
       }

       public function edit($id, $name, $phone, $passwd){
            return parent::edit($id, $name, $phone, $passwd);
       }
    }
?>