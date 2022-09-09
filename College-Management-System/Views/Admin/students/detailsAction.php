<?php
    require_once "classAutoload.php";

    //get User Details to be filled in the Form
    if (isset($_POST['editBtnID'])){
        $id = $_POST['editBtnID'];
        getMessage($id);
    }

    function getMessage($id){
        $view = new MessageView();

        $results = $view->getMessage($id);

        //sending User details  to the User Interface
        echo json_encode([$results]);
    }

?>
