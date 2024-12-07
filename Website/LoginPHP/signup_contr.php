<?php

declare(strict_types=1);

function is_input_empty(string $firstname, string $lastname, string $username, string $password) {
    if (empty($username) || empty($password) || empty($firstname) || empty($lastname)){
        return true;
    }
    else{
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo, $username)){
        return true;
    }
    else{
        return false;
    }
}

function create_user(object $pdo, string $firstname, string $lastname, string $username, string $password) {
    set_user($pdo, $firstname, $lastname, $username, $password);
}