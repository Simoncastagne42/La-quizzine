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

// Charger la question et les réponses associées
$sql = "SELECT question.questionName, answer.textReponse, answer.isCorrect 
        FROM answer 
        INNER JOIN question ON answer.idQuestion = question.id 
        WHERE question.id = :idQuestion";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['idQuestion' => $idQuestion]);
    $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($answers) {
        $textQuestion = $answers[0]['questionName'];
    } else {
        $textQuestion = 'Quizz';
    }

    // Retourner les données au format JSON
    echo json_encode([
        'idQuestion' => $idQuestion,
        'questionName' => $textQuestion,
        'answers' => $answers
    ]);
} catch (PDOException $error) {
    echo json_encode(['error' => $error->getMessage()]);
}
