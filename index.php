<?php
require_once './utils/connect_db.php';

$sql = "SELECT * FROM `user`";

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
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Lobster&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <h1 id="index-h1">Le Squizzie</h1>
    </header>
<main>
    <div id="bouttonPseudo">
<form action="./process_pseudo.php" method="post" id="pseudo">
        <label for="pseudo"></label>
        <input type="text" name="pseudo" placeholder="Entrez votre pseudo" id= "pseudo2">
        <input type="submit" value="Suivant" class="bouton_submit">
</form>
    </div>
</main>


</body>
</html>