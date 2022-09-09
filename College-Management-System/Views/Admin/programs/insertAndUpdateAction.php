<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insertProgram();
    }

    //handle update button click
    if (isset($_POST['action']) && $_POST['action'] == "update") {
        updateProgram();
    }

    function insertProgram()
    {
        global $code, $name, $faculty;;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $programController;

        $results = $programController->insert($code, $name, $faculty);
        if($results) {
           echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                        <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                $results . '</div>';
        }


    }


    function updateProgram()
    {
        global $code, $name, $faculty, $id;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $programController;

        $results = $programController->edit($id, $code, $name , $faculty);

        echo '<div class="alert alert-success alert-dismissible">
                            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                           '. $results.
                       '</div>';
    }

    function initializeVars(){
        global $code, $name, $faculty, $id;

        //this objects will be used to insert and update user data
        global $programController;
        $programController = new ProgramController();

        //These literal variables wll be used get data from the insert and update form
        $code = $_POST['program_code'];
        $name = $_POST['program_name'];
        $faculty = $_POST['faculty'];
        $id = $_POST['program_id'];
    }


?>
