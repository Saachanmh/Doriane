<?php
include 'db.php';
include 'functions.php';

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$schoolYearId = isset($_GET['school_year']) ? $_GET['school_year'] : null;
$classId = isset($_GET['class']) ? $_GET['class'] : null;
$moduleId = isset($_GET['module']) ? $_GET['module'] : null;
$trainerId = isset($_GET['trainer']) ? $_GET['trainer'] : null;

$events = getEvents($year, $month, $classId, $moduleId, $trainerId);
$schoolYears = getSchoolYears();
$classes = $schoolYearId ? getClasses($schoolYearId) : [];
$modules = $classId ? getModules($classId) : [];
$trainers = getTrainers();
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
    <?php include 'modules.php'; ?>
</div>
<div class="calendar">
    <?php include 'header.php'; ?>
    <?php include 'filters.php'; ?>
    <?php include 'calendar.php'; ?>
</div>
<div class="form">
    <?php include 'add_forms.php'; ?>
</div>
</body>
</html>
