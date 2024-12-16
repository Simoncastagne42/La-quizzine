<?php
require_once './utils/connect_db.php';

session_start();

$jsonData = file_get_contents("php://input");
$data = json_decode($jsonData, true);

if ($data !== null) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
        $stmt->bindParam(':pseudo', $_SESSION['user']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\PDOException $error) {
        throw $error;
    }



    if ($data === "true") {
        try {

            $newScore = $user['score'] + 1;
            $stmt = $pdo->prepare("UPDATE user SET score = :score WHERE id = :id;");
            $stmt->bindParam(':score', $newScore);
            $stmt->bindParam(':id', $user['id']);
            $stmt->execute();


            $response = ["message" => "Correct."];
        } catch (\PDOException $error) {
            throw $error;
        }
    } else {
        $response = ["message" => "Incorrect."];
    }
    header("Content-Type: application/json");
    echo json_encode($response);
} else {

    header("Content-Type: application/json", true, 400);
    echo json_encode(["error" => "Invalid JSON data"]);
}
