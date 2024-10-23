<?php

function chech_username($pdo, $username){
    $query = "SELECT username FROM admins WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function insert_admin($pdo, $username, $email, $phone, $role, $hashed_password){
    $query = "INSERT INTO admins(username, email, phone, role, pass_word) VALUES (:username, :email, :phone, :role, :pass_word);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":role", $role);
    $stmt->bindParam(":pass_word", $hashed_password);
    $stmt->execute();
}