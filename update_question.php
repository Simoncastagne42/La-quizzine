<?php
require_once './utils/connect_db.php';

session_start();

// Initialiser idQuestion si ce n'est pas déjà fait
if (!isset($_SESSION['idQuestion'])) {
    $_SESSION['idQuestion'] = 1;
} else {
    // Incrémenter idQuestion uniquement s'il est inférieur à 10
    if ($_SESSION['idQuestion'] < 10) {
        $_SESSION['idQuestion']++;
    }
}

// Récupérer l'idQuestion actuel
$idQuestion = $_SESSION['idQuestion'];

// Charger les réponses associées à la question
$sql = "SELECT * FROM `answer` WHERE idQuestion = :idQuestion";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['idQuestion' => $idQuestion]);
    $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les réponses et la pagination au format JSON
    echo json_encode([
        'idQuestion' => $idQuestion,
        'answers' => $answers
    ]);
} catch (PDOException $error) {
    echo json_encode(['error' => $error->getMessage()]);
}
?>
