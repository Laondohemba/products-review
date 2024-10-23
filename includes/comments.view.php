<?php

require_once "comments.model.php";
if(isset($_SESSION["comment_errors"])){
    $commentError = $_SESSION["comment_errors"] ?? [];
    unset($_SESSION["comment_errors"]);
}
