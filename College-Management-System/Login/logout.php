<?php
    require_once "classAutoload.php";
    Session::start();

    Session::destroy();

    header("Location: login.php");
?>