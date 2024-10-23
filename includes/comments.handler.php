<?php
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $postId = $_SESSION["current_post"]["id"];
    $name = htmlspecialchars($_POST["name"]);
    $comment = htmlspecialchars($_POST["comment"]);

    require_once "dbconn.php";
    require_once "comments.model.php";
    require_once "comments.contr.php";
    require_once "comments.fetch.php";

    // check errors
    $commentErrors = [];
    if(is_comment_empty($comment)){
        $commentErrors["comment_error"] = "Provide comment text";
    }
    if(is_comment_too_long($comment)){
        $commentErrors["comment_error"] = "Comments cannot be more than 200 words";
    }

    // assign anonymous to name if not provided
    if(is_name_empty($name)){
        $name = "Anonymous";
    }

    if(!empty($commentErrors)){
        $_SESSION["comment_errors"] = $commentErrors;
        header("Location: ../posts.php#comment");
        exit();
    }else{
        // insert comment into db
        if(is_comment_inserted($pdo, $postId, $name, $comment)){
         // fetch comments
            select_comments($pdo, $postId);
        }

        if (isset($_SESSION['title'])) {
            header("Location: ../posts.php?title={$_SESSION['title']}");
            unset($_SESSION['title']);
            exit();
        } else {
            header("Location: ../posts.php");
            exit();
        }
        
    }
}else{
    header("Location: ../posts.php");
}