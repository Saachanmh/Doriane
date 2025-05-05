<?php
include '.\BDD\_db.php';
include '.\Classes\functions.php';

$year = $_GET['year'] ?? date('Y');
$month = $_GET['month'] ?? date('m');
$schoolYearId = $_GET['school_year'] ?? null;
$classId = $_GET['class'] ?? null;
$moduleId = $_GET['module'] ?? null;
$trainerId = $_GET['trainer'] ?? null;

$events = getEvents($year, $month, $classId, $moduleId, $trainerId);
$schoolYears = getSchoolYears();
$classes = $schoolYearId ? getClasses($schoolYearId) : [];
$modules = $classId ? getModules($classId) : [];
$trainers = getTrainers();

//print_r($events)

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calendrier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="module">
    <?php include '.\Classes\modules.php'; ?>
</div>
<div class="calendar">
    <?php include '.\Process\header.php'; ?>
    <?php include '.\Classes\filters.php'; ?>
    <?php include '.\Classes\calendar.php'; ?>
</div>
<div class="form">
    <?php include '.\Classes\add_forms.php'; ?>
</div>
</body>
</html>
