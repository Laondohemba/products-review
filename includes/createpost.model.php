<?php

function create_post($pdo, $post_type, $title, $salesPitch, $image_upload_path, $post, $category, $admin, $affiliate_link){
    $query = "INSERT INTO posts(type, title, cover_image, description, post, category, admin, affiliate_link) VALUES (:post_type, :title, :cover_image, :description, :post, :category, :admin, :affiliate_link);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":post_type", $post_type);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":cover_image", $image_upload_path);
    $stmt->bindParam(":description", $salesPitch);
    $stmt->bindParam(":post", $post);
    $stmt->bindParam(":category", $category);
    $stmt->bindParam(":admin", $admin);
    $stmt->bindParam(":affiliate_link", $affiliate_link);
    $stmt->execute();
}