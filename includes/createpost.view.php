<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started already
}
require_once "createpost.model.php";

if(isset($_SESSION["empty_inputs"])){
    $postErrors = $_SESSION["empty_inputs"] ?? [];
    $formData = $_SESSION["form_data"] ?? [];
    unset($_SESSION["empty_inputs"]);
    unset($_SESSION["form_data"]);
}
