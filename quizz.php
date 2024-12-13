<?php
require_once './utils/connect_db.php';

$idQuestion = 1;
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
</head>

<body>
    <header>
        <h1>La Quizzine</h1>
    </header>

    <main>
        <section id="section-quizz">
            <h2>Qui Renaud a embrassé ?</h2>
            <article id="article-quizz">

                <?php foreach ($answers as $answer) {
                    echo '<div class="reponse">' . $answer['textReponse'] . "</div>";
                } ?>
            </article>
            <div id="pagination">3/10</div>

        </section>

    </main>


</body>

</html>