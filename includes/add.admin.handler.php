<?php

    // session started
    session_start();
    // required files
    require_once "dbconn.php";
    require_once "add.admin.model.php";
    require_once "add.admin.contr.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    // Collect post data
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $role = htmlspecialchars($_POST["role"]);
    $password = htmlspecialchars($_POST["password"]);

    // hash password
    $options = [
        "cost" => 12
    ];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

try {


        // error handlers
        $addAdminErrors = [];
        if(is_username_empty($username)){
            $addAdminErrors["username_error"] = "Please provide username";
        }
        if(is_username_taken($pdo, $username)){
            $addAdminErrors["username_error"] = "Username already taken!";
        }
        if(is_email_empty($email)){
            $addAdminErrors["email_error"] = "Please provide email";
        }
        if(is_email_wrong($email)){
            $addAdminErrors["email_error"] = "Email not valid!";
        }
        if(is_phone_empty($phone)){
            $addAdminErrors["phone_error"] = "Please provide phone number";
        }
        if(is_role_empty($role)){
            $addAdminErrors["role_error"] = "Please specify role";
        }
        if(is_password_empty($password)){
            $addAdminErrors["password_error"] = "Password cannot be empty";
        }
    
        // store errors in a session
        // var_dump($addAdminErrors);
        // exit;
        if(!empty($addAdminErrors)){
            $_SESSION["add_admin_errors"] = $addAdminErrors;
            $_SESSION["admin_data"] = $_POST;
            header("Location: ../admin.add.php");
            die();
        }else{
            is_admin_created($pdo, $username, $email, $phone, $role, $hashed_password);
            echo "admin created successfuly";
        }
}  catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
}else{
    header("Location: ../admin.add.php");
}