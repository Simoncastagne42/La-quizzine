<?php
require_once './utils/connect_db.php';

$sql = "SELECT * FROM `answer`";

try {
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
            <div class="reponse">Un pompier</div>
            <div class="reponse">Un infirmier</div>
            <div class="reponse">Un flic</div>
            <div class="reponse">Un militaire</div>
        </article>
        <div id="pagination">3/10</div>
        
        </section>
    </main>


</body>
</html>