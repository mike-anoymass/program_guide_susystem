<?php
    class SubjectView extends Subject{
      public function getAll()
      {
          return parent::getSubjects(); // TODO: Change the autogenerated stub
      }

      public function get($id)
      {
          return parent::getSubject($id); // TODO: Change the autogenerated stub
      }

        public function count()
      {
          return parent::countSubjects(); // TODO: Change the autogenerated stub
      }
    }
?>