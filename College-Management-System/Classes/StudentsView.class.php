<?php
    class StudentsView extends Students{
        public function checkUser($username, $passwd)
        {
            return parent::checkUserCredentials($username, $passwd);
        }

        public function getStudents(){
            return parent::getAll();
        }

        public function get($id){
            return parent::get($id);
        }
    }
?>