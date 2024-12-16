<?php
require_once './utils/connect_db.php';
session_start();
$sql = "SELECT * FROM `theme`";

try {
    $stmt = $pdo->query($sql);
    $themes = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}






?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="./style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

<header>
    <h1>Le Squizzie</h1>
</header>

    <Section id="section-theme">
        <p>
            <?php echo "Bonjour {$_SESSION['user']} Veuillez choisir un thème." ?>
        </p>
        <article id="article-theme">
            <a href="./quizz.php">Renaud</a>
            <a href="">Joe Dassin</a>
        </article>

    </Section>

</body>

</html>