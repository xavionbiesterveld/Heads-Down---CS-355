<?php

function load_leaderboard_alltime(object $pdo){
    try {
        $query = "SELECT 
                    ui.user_id,
                    ui.username,
                    li.score,
                    ci.cat_name AS category
                FROM 
                    leaderboard_info li
                LEFT JOIN 
                    user_info ui ON li.user_id = ui.user_id
                LEFT JOIN 
                    category_info ci ON li.cat_id = ci.cat_id
                ORDER BY 
                    li.score DESC;
                ";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);



        return $result;
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }
}

function load_leaderboard_personal(int $user_id, object $pdo){
    try {

        $query = "SELECT 
                        ui.user_id,
                        ui.username,
                        li.score,
                        ci.cat_name AS category
                    FROM 
                        leaderboard_info li
                    LEFT JOIN 
                        user_info ui ON li.user_id = ui.user_id
                    LEFT JOIN 
                        category_info ci ON li.cat_id = ci.cat_id
                    WHERE 
                        li.user_id = :user_id
                    ORDER BY 
                        li.score DESC;
                ";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
        }

    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }
}
