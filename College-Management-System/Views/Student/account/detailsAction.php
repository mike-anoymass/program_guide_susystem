<?php
    require_once "classAutoload.php";
    Session::start();

    //get User Details to be filled in the Form
    if (isset($_POST['action']) && $_POST['action'] == "load"){
        
        getUser(Session::get("userVars", "id"));
    }

    function getUser($id){
        $view = new StudentsView();

        $results = $view->get($id);

        //sending User details  to the User Interface
        echo json_encode([$results]);
    }

?>
