<?php
    class FacultyController extends Faculty{
       public function insert($name, $description)
       {
           return parent::insert($name, $description); // TODO: Change the autogenerated stub
       }

       public function edit($id, $name, $description)
       {
           return parent::editFaculty($id, $name, $description); // TODO: Change the autogenerated stub
       }

       public function delete($id)
       {
           return parent::deleteFaculty($id); // TODO: Change the autogenerated stub
       }

    }
?>