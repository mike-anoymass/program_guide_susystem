<?php
    require_once "classAutoload.php";
    Session::start();

    //get program and course ID to delete
    if (isset($_POST['subjectsBtnID'])) {
        $id = $_POST['subjectsBtnID'];

        Session::set("programVars", array("programID" => $id));

       echo '<div class="alert alert-info alert-dismissible">
                                    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    Please Wait...
                                    </div>';
    }

?>