<?php

declare(strict_types=1);

function get_cat_names(object $pdo){
    $query = "SELECT cat_id, cat_name FROM category_info";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_cat_words(object $pdo, string $catname){
    $query = "SELECT word_list FROM category_info WHERE cat_name = :cat_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":cat_name", $catname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

