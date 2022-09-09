<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insert();
    }

    function insert()
    {
        if(!checkExistence()){
            if(checkTotal() < 4){
                global $student, $subject, $grade;
                //to initialize the objects used to inserting data and
                // variables for getting submitted data from the insert form
                initializeVars();
    
                global $controller;
    
                $results = $controller->insert($student, $subject, $grade);

                if($results) {
                    echo $results;
                    }else{
                        echo '<div class="alert alert-danger alert-dismissible">
                                    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                            $results . '</div>';
                    }

            }else{
                echo '<div class="alert alert-danger alert-dismissible">
                            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                Only four best subjects are allowed
                            </div>';
            }
        }else{
            echo "This Subject Exist!!!";
        }
        
    }

    function initializeVars(){
        global $student, $subject, $grade;

        //this objects will be used to insert and update user data
        global $controller;
        $controller = new SSController();

        //These literal variables wll be used get data from the insert and update form
        $student = $_POST['student_id'];
        $subject = $_POST['subject'];
        $grade = $_POST['grade'];
    }

    function checkExistence(){
        initializeVars();
        global $student, $subject;

        $view = new SSView();

        return $view->checkExistence($student, $subject);
    }

    function checkTotal(){
        initializeVars();
        global $student;

        $view = new SSView();

        if($view->get($student) == false){
            return 0;
        }else{
            return count($view->get($student));
        }  
    }

?>