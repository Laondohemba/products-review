<?php
// function to select comment from db
function select_comments($pdo, $postId){
    $query = "SELECT created_by, comment FROM comments WHERE post_id = :post_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":post_id", $postId);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
 // store fetched comments in a session variable
//  $postId = $_SESSION["current_post"]["id"];
//  $_SESSION["comments"] = select_comments($pdo, $postId);