<?php
    require_once "classAutoload.php";

    Session::start();

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insert();
    }

  

    function insert()
    {
        global $name, $phone , $password;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $controller;

        $results = $controller->edit(Session::get("userVars", "id"), $name, $phone, $password);

        echo '<div class="alert alert-success alert-dismissible">
                            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                           '. $results.
                       '</div>';

    }


    function initializeVars(){
        global $name, $phone , $password;

        //this objects will be used to insert and update user data
        global $controller;
        $controller = new StudentsController();

        //These literal variables wll be used get data from the insert and update form
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
    }


?>
