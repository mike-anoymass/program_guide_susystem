<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insertFaculty();
    }

    //handle update button click
    if (isset($_POST['action']) && $_POST['action'] == "update") {
        updateFaculty();
    }

    function insertFaculty()
    {
        global $name, $description;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $facultyController;

        $results = $facultyController->insert($name, $description);
        if($results) {
           echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                        <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                $results . '</div>';
        }


    }


    function updateFaculty()
    {
        global $id, $name, $description;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $facultyController;

        $results = $facultyController->edit($id, $name, $description);

        echo '<div class="alert alert-success alert-dismissible">
                            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                           '. $results.
                       '</div>';
    }

    function initializeVars(){
        global $id, $name, $description;

        //this objects will be used to insert and update user data
        global $facultyController;
        $facultyController = new FacultyController();

        //These literal variables wll be used get data from the insert and update form
        $id = $_POST['faculty_id'];
        $name = $_POST['faculty_name'];
        $description = $_POST['description'];
    }


?>
