<?php

session_start();
require_once "add.admin.model.php";

if(isset($_SESSION["add_admin_errors"])){
    $adminErrors = $_SESSION["add_admin_errors"] ?? [];
    $formData = $_SESSION["admin_data"] ?? [];
    unset($_SESSION["add_admin_errors"]);
}