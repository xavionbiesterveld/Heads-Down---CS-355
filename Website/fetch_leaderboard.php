<?php
function load_leaderboard_alltime(){

    try {
        require_once 'dbh.php';


        $query = "SELECT user_id, username, score, category FROM leaderboard_info ORDER BY score DESC";
        #need joined query work on later.
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

        return $result;
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage())
    }
}

function load_leaderboard_personal(int $user_id){

    try {
        require_once 'dbh.php';


        $query = "SELECT username, score, category FROM leaderboard_info ORDER BY score DESC WHERE user_id = :user_id;";
        $stmt->bindParam(":user_id", $user_id);
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

        return $result;
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage())
    }
}