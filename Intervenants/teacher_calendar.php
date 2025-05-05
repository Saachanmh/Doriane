<?php
include '../BDD/db.php';
include 'functions.php';

$year = $_GET['year'] ?? date('Y');
$month = $_GET['month'] ?? date('m');
$trainerId = $_GET['trainer'] ?? null;

$events = getEvents($year, $month, null, null, $trainerId);
$schoolYears = getSchoolYears();
$trainers = getTrainers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calendrier des Formateurs</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="container">
    <div class="calendar">
        <?php include '../Process/header.php'; ?>
        <?php include 'filters.php'; ?>
        <?php include 'calendar.php'; ?>
    </div>
    <div class="form">
        <?php include 'add_forms.php'; ?> <!-- Inclure le formulaire ici -->
    </div>
</div>
</body>
</html>
