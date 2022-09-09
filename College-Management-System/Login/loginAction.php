<?php
    require_once "classAutoload.php";

    Session::start();

    if(isset($_POST['action']) && $_POST['action']=="login"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $results = false;
        $adminCredentials = new AdminView();
        $studentCredentials = new StudentsView();

        $adminResponse = $adminCredentials->checkCredentials($username, $password);
        $studentResponse = $studentCredentials->checkUser($username, $password);

        if($adminResponse){
            $results = $adminResponse;
        }elseif($studentResponse){
            $results = $studentResponse;
        }else{
            $results = false;
        }

        if($results == false){
            echo "<i class='fa fa-lg fa-warning'>Failed to Login_> Enter Valid Credentials</i></p>";
        }else{
            if ($results['type'] == "admin") {
                Session::set("userVars", array(
                    "id" => $results['id'],
                    "username" => $results['email'],
                    "name" => $results['name'],
                    "type" => $results['type'],
                    "created_on" => $results['created_on'],
                    "password" => $results['password'],
                ));
            }else {
                Session::set("userVars", array(
                    "id" => $results['id'],
                    "username" => $results['username'],
                    "firstname" => $results['firstname'],
                    "middlename" => $results['middlename'],
                    "lastname" => $results['lastname'],
                    "type" => $results['type'],
                    "created_on" => $results['created_on'],
                    "password" => $results['password'],
                ));
            }

        }
    }
