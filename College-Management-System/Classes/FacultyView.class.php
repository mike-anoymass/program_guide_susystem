<?php
    class FacultyView extends Faculty{
      public function getAll()
      {
          return parent::getFaculties(); // TODO: Change the autogenerated stub
      }

      public function get($id)
      {
          return parent::getFaculty($id); // TODO: Change the autogenerated stub
      }

        public function count()
      {
          return parent::countFaculties(); // TODO: Change the autogenerated stub
      }
    }
?>