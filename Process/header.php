<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calendrier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="header">
    <h1><?php echo date('F Y', strtotime("$year-$month-01")); ?></h1>
    <nav>
        <a href="../index.php" class="nav-link">Calendrier Général</a>
        <a href="../Intervenants/teacher_calendar.php" class="nav-link">Calendrier des Formateurs</a>
    </nav>
</div>
</body>
</html>
