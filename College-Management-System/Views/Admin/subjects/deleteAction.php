<?php
    require_once "classAutoload.php";

    //get Course ID and delete
    if (isset($_POST['action']) && $_POST['action'] == "delete") {
        $id = $_POST['subject_id'];

        $contr = new SubjectController();

        $results = $contr->delete($id);

        echo '<div class="alert alert-danger alert-dismissible">
                                <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                                '.$results .' 
                           </div>';

    }

?>