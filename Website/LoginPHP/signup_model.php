<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $query = "SELECT username FROM user_info WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $firstname, string $lastname, string $username, string $password){
    $query = "INSERT INTO user_info (username, password, first_name, last_name, is_admin) VALUES (:username, :password, :firstname, :lastname, 0);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashpass);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->execute();
}