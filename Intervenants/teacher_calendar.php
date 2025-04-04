<?php
include 'db.php';
include 'functions.php';

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$trainerId = isset($_GET['trainer']) ? $_GET['trainer'] : null;

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
        <?php include 'header.php'; ?>
        <?php include 'filters.php'; ?>
        <?php include 'calendar.php'; ?>
    </div>
</div>
</body>
</html>
