<?php

// function to get username from dastabase;
function get_username($pdo, $username){
    $query = "SELECT * FROM admins WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}