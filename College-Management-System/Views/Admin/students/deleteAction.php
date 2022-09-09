<?php
    require_once "classAutoload.php";

    //get student ID and delete
    if (isset($_POST['delBtnID'])) {
        $id = $_POST['delBtnID'];

        $contr = new StudentsController();

        $contr->delete($id);

        echo '<div class="alert alert-danger alert-dismissible">
                                <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                                Student has been Removed 
                           </div>';

    }

?>