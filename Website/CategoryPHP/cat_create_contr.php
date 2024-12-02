<?php

declare(strict_types=1);

function is_input_empty(string $catname, string $catwords) {
    if (empty($catname) || empty($catwords)){
        return true;
    }
    else{
        return false;
    }
}

function does_cat_exist(object $pdo, string $catname) {
    if (get_cat($pdo, $catname)){
        return true;
    }
    else{
        return false;
    }
}

function is_catwords_valid(string $catwords) {
    $pattern = '/^[a-zA-Z ,]*$/';
    return (bool)preg_match($pattern, $catwords);
}

function create_cat(object $pdo, string $catname, string $catwords_nospaces, int $user_id) {
    set_user($pdo, $catname, $catwords_nospaces);
}