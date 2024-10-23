<?php

// functions to check input data
function is_username_empty($username){
    if(empty($username)){
        return true;
    }else{
        return false;
    }
}
function is_username_taken($pdo, $username){
    if(!empty(chech_username($pdo, $username))){
        return true;
    }else{
        return false;
    }
}
function is_email_empty($email){
    if(empty($email)){
        return true;
    }else{
        return false;
    }
}
function is_email_wrong($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function is_phone_empty($phone){
    if(empty(trim($phone))){
        return true;
    }else{
        return false;
    }
}
function is_role_empty($role){
    if(empty(trim($role))){
        return true;
    }else{
        return false;
    }
}
function is_password_empty($password){
    if(empty($password)){
        return true;
    }else{
        return false;
    }
}
function is_admin_created($pdo, $username, $email, $phone, $role, $hashed_password){
    if(insert_admin($pdo, $username, $email, $phone, $role, $hashed_password)){
        return true;
    }else{
        return false;
    }
}