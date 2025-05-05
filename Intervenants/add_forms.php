<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calendrier</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="drag_and_drop.js"></script>
</head>
<body>
<div class="add-forms">
    <h2>Ajouter des éléments</h2>

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
</body>
</html>
