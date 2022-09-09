<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insertGrade();
    }

    //handle update button click
    if (isset($_POST['action']) && $_POST['action'] == "update") {
        updateSubject();
    }

    function insertGrade()
    {
        global $grade, $description;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $cntrl;

        $results = $cntrl->insert($grade, $description);
        if($results) {
           echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                        <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                $results . '</div>';
        }


    }


    function updateSubject()
    {
        global $id, $name, $description;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $subjectController;

        $results = $subjectController->edit($id, $name, $description);

        echo '<div class="alert alert-success alert-dismissible">
                            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                           '. $results.
                       '</div>';
    }

    function initializeVars(){
        global $grade, $description;

        //this objects will be used to insert and update user data
        global $cntrl;
        $cntrl = new GradeController;

        //These literal variables wll be used get data from the insert and update form
        $grade = $_POST['grade_id'];
        $description = $_POST['description'];
    }


?>
