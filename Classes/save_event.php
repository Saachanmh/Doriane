<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $moduleId = $_POST['module_id'];
    $date = $_POST['date'];

    // Convertir la date en format YYYY-MM-DD
    $date = date('Y-m-d', strtotime($date));

    // Insérer l'événement dans la base de données
    $stmt = $pdo->prepare("INSERT INTO events (module_id, start_date) VALUES (?, ?)");
    $result = $stmt->execute([$moduleId, $date]);

    // Retourner une réponse JSON
    echo json_encode(['success' => $result]);
}
?>
