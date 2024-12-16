<?php
session_start();

// Réinitialiser idQuestion à 1
$_SESSION['idQuestion'] = 1;

// Retourner une réponse JSON confirmant la réinitialisation
echo json_encode(['message' => 'Session réinitialisée', 'idQuestion' => $_SESSION['idQuestion']]);
