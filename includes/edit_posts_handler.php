<?php

require_once "dbconn.php";
// edit function 
function edit_post($pdo, $title){
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE title = :title;");
    $stmt->bindParam(":title", $title);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}