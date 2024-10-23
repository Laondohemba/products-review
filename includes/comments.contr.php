<?php

// function to check comment errors
function is_comment_empty($comment){
    if(empty($comment)){
        return true;
    }else{
        return false;
    }
}
// function to check if comment is too long
function is_comment_too_long($comment){
    $word_count = str_word_count($comment);
    if($word_count > 200){
        return true;
    }else{
        return false;
    }
}
// function to assign anonymous to name if not provided
function is_name_empty($name){
    if(empty($name)){
        return true;
    }else{
        return false;
    }
}
// function to check if comment has been incserted into the db
function is_comment_inserted($pdo, $postId, $name, $comment){
    if(insert_comment($pdo, $postId, $name, $comment)){
        return true;
    }else{
        return false;
    }
}
// check if comments exits for the post
// function all_comments($pdo, $postId){
//     if(select_comments($pdo, $postId)){
//         return true;
//     }else{
//         return false;
//     }
// }
