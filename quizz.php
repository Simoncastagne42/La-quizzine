<?php
require_once './utils/connect_db.php';

session_start();

// Réinitialiser uniquement la valeur de idQuestion à chaque refresh
$_SESSION['idQuestion'] = 1;

require_once './utils/connect_db.php';

// Charger la première question
$idQuestion = $_SESSION['idQuestion'];

// Charger les réponses associées
$sql = "SELECT * FROM `answer` WHERE idQuestion = :idQuestion";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['idQuestion' => $idQuestion]);
    $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}
$sql = "SELECT * FROM `answer` WHERE idQuestion = $idQuestion";

try {
    $stmt = $pdo->query($sql);
    $answers = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Quizzine</title>
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
    <h2 id="question-title">Qui Renaud a embrassé ?</h2>
    <article id="article-quizz">
        <?php foreach ($answers as $answer): ?>
            <div class="reponse" data-correct="<?php echo $answer['isCorrect'] ? 'true' : 'false'; ?>">
                <?php echo htmlspecialchars($answer['textReponse']); ?>
            </div>
        <?php endforeach; ?>
    </article>

    <div id="pagination"><?php echo $idQuestion ?>/10</div>
    <button id="nextQuestion">Question Suivante</button>
   
</section>

    </main>


</body>

</html>