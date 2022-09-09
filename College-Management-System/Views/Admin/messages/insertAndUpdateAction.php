<?php
    require_once "classAutoload.php";

    Session::start();

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insert();
    }

  

    function insert()
    {
        global $id, $response;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $messageController;

        $results = $messageController->edit($id, $response, Session::get("userVars", "id"));

        echo '<div class="alert alert-success alert-dismissible">
                            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                           '. $results.
                       '</div>';

    }


    function initializeVars(){
        global $id, $response;

        //this objects will be used to insert and update user data
        global $messageController;
        $messageController = new MessageController();

        //These literal variables wll be used get data from the insert and update form
        $id = $_POST['message_id'];
        $response = $_POST['response'];
    }


?>
