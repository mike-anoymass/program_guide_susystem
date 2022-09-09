<?php
    require_once "classAutoload.php";
    Session::start();

    //get User Details to be filled in the Form
    if (isset($_POST['action']) && $_POST['action'] == "load"){
        
        getMessage(Session::get("userVars", "id"));
    }

    function getMessage($id){
        $view = new UserView();

        $results = $view->getUser($id);

        //sending User details  to the User Interface
        echo json_encode([$results]);
    }

?>
