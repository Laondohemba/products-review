<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started already
}
require_once "login.handler.model.php";

if(isset($_SESSION["login_errors"])){
    $loginError = $_SESSION["login_errors"] ?? [];
    unset($_SESSION["login_errors"]);
}
if(isset($_SESSION["admin_login"])){
    $admin = $_SESSION["admin_login"] ?? [];
}