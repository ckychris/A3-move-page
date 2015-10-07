<?php
    session_start();

    if(isset($_POST["name"])){
        $_SESSION["name"] = $_POST["name"];
        echo preg_match("/^[a-z\sA-Z]+$/", $_POST["name"]);
    }  
    if(isset($_POST["email"])){
        $_SESSION["email"] = $_POST["email"];
        echo filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    }
    if(isset($_POST["phone"])){
        $_SESSION["phone"] = $_POST["phone"];
        echo preg_match("/^(\(04\)|04|\+614)?\d{4}?\d{4}$/", $_POST["phone"]);
    }
?>