<?php

require_once "dbconn.php";
// function to fetch posts for admin
function fetch_admin_posts($pdo){
    $query = "SELECT title, admin, created_at FROM posts;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}