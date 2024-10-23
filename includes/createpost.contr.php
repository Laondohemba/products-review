<?php

// function to take categories as arrays and cover to strings
function category_list($categories, $category_list){
    if($categories){
        return $category_list = implode(" ", $categories); // Combine categories into a string
    }else{
        return $category_list = "No category selected";
    }
}
// functions to check empty inputs
function is_post_type_empty($post_type){
    if(empty($post_type)){
        return true;
    }else{
        return false;
    }
}
function is_title_empty($title){
    if(empty($title)){
        return true;
    }else{
        return false;
    }
}
function is_image_not_provided($image_tmp_name, $image_upload_path){
    if (!move_uploaded_file($image_tmp_name, $image_upload_path)) {
        return true;
    } else {
        return false;
    }
}
function is_sales_pitch_empty($salesPitch){
    if(empty($salesPitch)){
        return true;
    }else{
        return false;
    }
}
function is_post_empty($post){
    if(empty($post)){
        return true;
    }else{
        return false;
    }
}
function is_category_not_selected($categories, $category_list){
    if(empty(category_list($categories, $category_list))){
        return true;
    }else{
        return false;
    }
}
function is_affiliate_link_empty($affiliate_link){
    if(empty($affiliate_link)){
        return true;
    }else{
        return false;
    }
}
// function to insert data into database
function is_post_created($pdo, $post_type, $title, $salesPitch, $image_upload_path, $post, $category, $admin, $affiliate_link){
    if(create_post($pdo, $post_type, $title, $salesPitch, $image_upload_path, $post, $category, $admin, $affiliate_link)){
        return true;
    }else{
        return false;
    }
}