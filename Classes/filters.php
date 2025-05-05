<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calendrier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
</body>
</html>
<form method="get" action="">
    <label for="month">Mois :</label>
    <select name="month" id="month" onchange="this.form.submit()">
        <?php
        for ($m = 1; $m <= 12; $m++) {
            $monthName = date('F', mktime(0, 0, 0, $m, 1));
            $selected = ($m == $month) ? 'selected' : '';
            echo "<option value=\"$m\" $selected>$monthName</option>";
        }
        ?>
    </select>

    <?php
    $annee = '';
    if (isset($_POST['school_year'])) {
        $annee = $_POST['school_year'];
        echo 'toto';
    }
    ?>

    <label for="school_year">Année scolaire :</label>
    <?php global $schoolYearId; ?>
    <select name="school_year" id="school_year" onchange="this.form.submit()">
        <option value="">-- Sélectionnez une année scolaire --</option>
        <?php foreach ($schoolYears as $sy): ?>
            <option value="<?php echo $sy['id']; ?>" <?php echo $sy['id'] == $schoolYearId ? 'selected' : ''; ?>>
                <?php echo date('Y', strtotime($sy['start_date'])) . ' - ' . date('Y', strtotime($sy['end_date'])); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <?php print_r($classes); ?>

    <label for="class">Classe :</label>
    <select name="class" id="class" onchange="this.form.submit()">
        <option value="">-- Sélectionnez une classe --</option>
        <?php foreach ($classes as $class): ?>
            <option value="<?= $class['id'] ?>" <?= $class['id'] == $classId ? 'selected' : '' ?>>
                <?= $class['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>
