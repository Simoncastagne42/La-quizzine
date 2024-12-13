<?php
require_once './connect_db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ./index.php');
    return;
}

if (
    !isset(
        $_POST['pseudo'],

    )
) {
    header('location: ./index.php');
    return;
}

if (
    empty($_POST['pseudo'])

) {
    header('location: ./index.php');
    return;
}

// input sanitization
$pseudo = htmlspecialchars(trim($_POST['pseudo']));



// a remplir en fonction de vos prerequis
if (
    strlen($pseudo) > 25
) {
    header('location: ./index.php');
    return;
}


function pseudoExiste($pdo, $pseudo)
{
    // Préparation de la requête SQL avec un paramètre lié
    $sql = "SELECT COUNT(*) FROM user WHERE pseudo = :pseudo";
    $stmt = $pdo->prepare($sql);

    // Liaison du paramètre 'pseudo' avec la valeur de la variable $pseudo
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

    // Exécution de la requête
    $stmt->execute();

    // Retourne vrai si le pseudo existe (compte > 0), sinon faux
    return $stmt->fetchColumn() > 0;
};


function creerPseudo($pdo, $pseudo)
{
    $sql = "INSERT INTO user (pseudo) VALUES (:pseudo)";
    $stmt = $pdo->prepare($sql);
    // Liaison du paramètre 'pseudo' avec la valeur de la variable $pseudo
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    // Exécution de la requête
    $stmt->execute();
}

session_start();

if (pseudoExiste($pdo, $pseudo)) {
    $_SESSION['user'] = $pseudo;
    header('location: ./test.php');
    exit;
} else {

    creerPseudo($pdo, $pseudo);
    $_SESSION['user'] = $pseudo;
    header('location: ./test.php');
    exit;
}
