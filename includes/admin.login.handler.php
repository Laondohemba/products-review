<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "dbconn.php";
    require_once "login.handler.model.php";
    require_once "login.handler.contr.php";

    // error handlers
    session_start();
    $loginErrors = [];

    if(is_username_empty($username)){
        $loginErrors["username_error"] = "Provide Username";
    }
    if(!does_username_exist($pdo, $username)){
        $loginErrors["username_error"] = "Username not found";
    }

    // assign details fetch from the database to a variable
    $user = does_username_exist($pdo, $username);
    // var_dump($user);
    // exit();
    if(password_verify($password, $user["pass_word"])){
        $_SESSION["admin_login"] = $user;
        header("Location: ../admin.dashboard.php");
        die();
    }else{
        $loginErrors["login_error"] = "Username or Password error! Please note that passwords are case sensitive";
    }

    // store errors in a session
    if(!empty($loginErrors)){
        $_SESSION["login_errors"] = $loginErrors;
        header("Location: ../admin.login.php");
        die();
    }
    die();
}else{
    header("Location: ../admin.login.php");
}