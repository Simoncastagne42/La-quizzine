<?php
session_start();
$_SESSION['idQuestion'] = 1; // Réinitialiser l'idQuestion à 1
echo json_encode(['message' => 'Session réinitialisée']);
?>