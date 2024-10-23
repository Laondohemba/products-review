<?php

// function to insert comment
function insert_comment($pdo, $postId, $name, $comment){
    $query = "INSERT INTO comments (post_id, created_by, comment) VALUES (:post_id, :created_by, :comment);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":post_id", $postId);
    $stmt->bindParam(":created_by", $name);
    $stmt->bindParam(":comment", $comment);
    $stmt->execute();
}
