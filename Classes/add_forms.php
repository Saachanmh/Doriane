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
<div class="add-forms">
    <h2>Ajouter des éléments</h2>

    <form method="post" action="process_add.php">
        <h3>Ajouter une année scolaire</h3>
        <label for="start_date">Date de début :</label>
        <input type="date" id="start_date" name="start_date" required>
        <label for="end_date">Date de fin :</label>
        <input type="date" id="end_date" name="end_date" required>
        <input type="submit" name="add_school_year" value="Ajouter">
    </form>

    <form method="post" action="process_add.php">
        <h3>Ajouter une classe</h3>
        <label for="class_name">Nom :</label>
        <input type="text" id="class_name" name="class_name" required>
        <label for="school_year_id">Année scolaire :</label>
        <select name="school_year_id" id="school_year_id" required>
            <?php foreach ($schoolYears as $sy): ?>
                <option value="<?= $sy['id'] ?>"><?= date('Y', strtotime($sy['start_date'])) . ' - ' . date('Y', strtotime($sy['end_date'])) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="add_class" value="Ajouter">
    </form>

    <form method="post" action="process_add.php">
        <h3>Ajouter un module</h3>
        <label for="module_name">Nom :</label>
        <input type="text" id="module_name" name="module_name" required>
        <label for="class_id">Classe :</label>
        <select name="class_id" id="class_id" required>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>"><?= $class['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="add_module" value="Ajouter">
    </form>

    <form method="post" action="process_add.php">
        <h3>Ajouter un formateur</h3>
        <label for="trainer_name">Nom :</label>
        <input type="text" id="trainer_name" name="trainer_name" required>
        <label for="trainer_email">Email :</label>
        <input type="email" id="trainer_email" name="trainer_email">
        <label for="trainer_phone">Téléphone :</label>
        <input type="text" id="trainer_phone" name="trainer_phone">
        <input type="submit" name="add_trainer" value="Ajouter">
    </form>
</div>
