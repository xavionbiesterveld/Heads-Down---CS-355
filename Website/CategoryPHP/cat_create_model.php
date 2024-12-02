<?php

declare(strict_types=1);

function get_cat(object $pdo, string $catname){
    $query = "SELECT cat_name FROM category_info WHERE cat_name = :cat_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":cat_nam", $catname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $catname, string $catwords_nospaces, int $user_id){
    $query = "INSERT INTO category_info (cat_name, is_custom, made_by, word_list) VALUES (:cat_name, 1, :made_by, :word_list);";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":cat_name", $catname);
    $stmt->bindParam(":mad_by", $user_id);
    $stmt->bindParam(":word_list", $catwords_nospaces);
    $stmt->execute();
}