<?php
require_once './utils/connect_db.php';

session_start();

// Réinitialiser à la question 1 à chaque chargement de la page
$_SESSION['idQuestion'] = 1;

// Charger l'idQuestion actuel
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
        $textQuestion = 'Aucune question disponible.';
    }
} catch (PDOException $error) {
    die("Erreur lors de la requête : " . $error->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Squizzie</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Lobster&display=swap" rel="stylesheet">
    <script defer src="./script.js"></script>
</head>

<body>
    <header>
        <h1>Le Squizzie</h1>
    </header>

    <main>
        <section id="section-quizz">
            <h2 id="question-title"><?php echo htmlspecialchars($textQuestion); ?></h2>
            <article id="article-quizz">
                <?php foreach ($answers as $answer): ?>
                    <div class="reponse" data-correct="<?php echo $answer['isCorrect'] ? 'true' : 'false'; ?>">
                        <?php echo htmlspecialchars($answer['textReponse']); ?>
                    </div>
                <?php endforeach; ?>
            </article>
            <div id="pagination"><?php echo $idQuestion; ?>/10</div>
            <?php if ($idQuestion == 10){
                echo "Voir résultats";
            } ?> 

            <button id="nextQuestion" class="">Question Suivante</button>
        </section>
    </main>
</body>

</html>