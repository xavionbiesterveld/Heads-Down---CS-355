<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password) {
    if (empty($username) || empty($password)){
        return true;
    }
    else{
        return false;
    }
}

function does_username_exist(bool|array $result){
    if ($result){
        return true;
    }
    else{
        return false;
    }
}

function is_password_correct(string $password, string $hashpass){
    if (password_verify($password, $hashpass)){
        return true;
    }
    else{
        return false;
    }
}