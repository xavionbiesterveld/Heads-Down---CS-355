<?php

function load_category_names(){
    try {
        require_once 'dbh.php';
        require_once 'CategoryPHP/cat_load_model.php';

        $names = get_cat_names($pdo);

        $pdo = null;
        $stmt = null;

        return $names;
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }
}

function load_category_words(){
    try {
        require_once 'dbh.php';
        require_once 'CategoryPHP/cat_load_model.php';

        $words = get_cat_words($pdo);

        $pdo = null;
        $stmt = null;

        return $words;
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }
}