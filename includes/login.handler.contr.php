<?php

// functions to check error messages
function is_username_empty($username){
    if(empty($username)){
        return true;
    }else{
        return false;
    }
}
function does_username_exist($pdo, $username){
        return get_username($pdo, $username);
}