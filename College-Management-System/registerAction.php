<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insertStudent();
    }

    function insertStudent()
    {
        global $first_name, $middle_name, $last_name, $gender,
        $address, $mobile_no, $username, $year, $school, $password;
        global $controller;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        $results = $controller->setStudent($first_name, $middle_name, $last_name, $gender,
        $address, $mobile_no, $username, $year, $school, $password);

        if($results) {
           echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                        <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                $results . '</div>';
        }


    }

    function initializeVars(){
        global $first_name, $middle_name, $last_name, $gender,
         $address, $mobile_no, $school, $year, $username, $password;

        //this objects will be used to insert and update user data
        global $controller;
        $controller = new StudentsController();

        //These literal variables wll be used get data from the insert and update form
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $mobile_no = $_POST['mobile_no'];
        $school = $_POST['school'];
        $year = $_POST['year'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }


?>
