<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insert();
    }

    //handle update button click
    if (isset($_POST['action']) && $_POST['action'] == "update") {
        updateFaculty();
    }

    function insert()
    {
        if(!checkExistence()){
            if(checkTotal() < 4){
                global $program, $subject, $grade;
                //to initialize the objects used to inserting data and
                // variables for getting submitted data from the insert form
                initializeVars();

                global $psController;

                $results = $psController->insert($program, $subject, $grade);

                if($results) {
                echo $results;
                }else{
                    echo '<div class="alert alert-danger alert-dismissible">
                                <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                        $results . '</div>';
                }
            }else{
                echo "Only four subjects are allowed for each program!";
            }
            
        }else{
            echo "This Subject Exist!!!";
        }
        


    }

    function initializeVars(){
        global $program, $subject, $grade;

        //this objects will be used to insert and update user data
        global $psController;
        $psController = new PSController();

        //These literal variables wll be used get data from the insert and update form
        $program = $_POST['program_id'];
        $subject = $_POST['subject'];
        $grade = $_POST['grade'];
    }

    function checkExistence(){
        initializeVars();
        global $program, $subject;

        $view = new PSView();

        return $view->checkExistence($program, $subject);
    }

    function checkTotal(){
        initializeVars();
        global $program, $subject;

        $view = new PSView();

        if($view->get($program) == false){
            return 0;
        }else{
            return count($view->get($program));
        }  
    }


?>
