<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insertSubject();
    }

    //handle update button click
    if (isset($_POST['action']) && $_POST['action'] == "update") {
        updateSubject();
    }

    function insertSubject()
    {
        global $name, $description;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $subjectController;

        $results = $subjectController->insert($name, $description);
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
        global $id, $name, $description;

        //this objects will be used to insert and update user data
        global $subjectController;
        $subjectController = new SubjectController();

        //These literal variables wll be used get data from the insert and update form
        $id = $_POST['subject_id'];
        $name = $_POST['subject_name'];
        $description = $_POST['description'];
    }


?>
