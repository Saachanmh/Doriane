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

    <label for="trainer">Formateur :</label>
    <select name="trainer" id="trainer" onchange="this.form.submit()">
        <option value="">-- Sélectionnez un formateur --</option>
        <?php foreach ($trainers as $trainer): ?>
            <option value="<?= $trainer['id'] ?>" <?= $trainer['id'] == $trainerId ? 'selected' : '' ?>><?= $trainer['name'] ?></option>
        <?php endforeach; ?>
    </select>
</form>


</form>

