<?php

session_start();
$postErrors = [];

require_once "dbconn.php";
require_once "createpost.model.php";
require_once "createpost.contr.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Collect post data
    $post_type = htmlspecialchars($_POST["posttype"]);
    $title = htmlspecialchars($_POST["title"]);

    // Handle image
    $cover_image = $_FILES["displayimage"];
    $image_name = $cover_image["name"];
    $image_tmp_name = $cover_image["tmp_name"];
    $upload_directory = 'uploads/'; // Define the upload directory

    // Ensure the upload directory exists
    if (!is_dir($upload_directory)) {
        mkdir($upload_directory, 0755, true);
    };
    
    $image_name = str_replace(' ', '_', $image_name); // Replace spaces with underscores
    $image_name = preg_replace('/[^A-Za-z0-9_\-\.]/', '', $image_name); // Remove special characters

    // Move the uploaded image to the desired folder
    $image_upload_path = $upload_directory . basename($image_name);
 

    // Collect other form fields
    $salesPitch = htmlspecialchars($_POST["sales_pitch"]);
    $post = trim($_POST["post"]);
    
    // Handle category checkboxes
    $category_list = "";
    $categories = $_POST["category"];
    $category = category_list($categories, $category_list);

    // affiliate link
    $affiliate_link = htmlspecialchars($_POST["affiliate_link"]);

    // Display collected data
    echo "Post Type: " . $post_type . "<br>";
    echo "Title: " . $title . "<br>";
    echo "<img src='" . $image_upload_path . "' width='300'><br>";
    echo "Description: " . $salesPitch . "<br>";
    echo "Post: " . $post . "<br>";
    echo "Categories: " . $category  . "<br>";

    $admin = $_SESSION["admin_login"]["username"] ?? [];

    try {
        // error handlers

        if(is_post_type_empty($post_type)){
            $postErrors["post_type_error"] = "Select post type";
        }
        if(is_title_empty($title)){
            $postErrors["title_error"] = "Provide a post title";
        }
        if(is_image_not_provided($image_tmp_name, $image_upload_path)){
            $postErrors["image_error"] = "Choose a display image";
        }
        if(is_sales_pitch_empty($salesPitch)){
            $postErrors["sales_pitch"] = "Write some sales pitch";
        }
        if(is_post_empty($post)){
            $postErrors["post_error"] = "Post content cannot be empty";
        }
        if(is_category_not_selected($categories, $category_list)){
            $postErrors["category_error"] = "Select a category";
        }
        if(is_affiliate_link_empty($affiliate_link)){
            $postErrors["affiliate_link"] = "Please provide affiliate link";
        }

        if(!empty($postErrors)){
            $_SESSION["empty_inputs"] = $postErrors;
            $_SESSION["form_data"] = $_POST;
            header("Location: ../admin.createpost.php");
            die();
        }else{
            is_post_created($pdo, $post_type, $title, $salesPitch, $image_upload_path, $post, $category, $admin, $affiliate_link);
            echo "post created successfully!";
        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect to the form page if the request method is not POST
    header("Location: ../admin.createpost.php");
}
