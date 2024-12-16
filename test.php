<?php

require_once './utils/connect_db.php';

session_start();



$stmt = $pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
$stmt->bindParam(':pseudo', $_SESSION['user']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($user['score']);
die();