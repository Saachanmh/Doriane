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

    <label for="school_year">Année scolaire :</label>
    <select name="school_year" id="school_year" onchange="this.form.submit()">
        <option value="">-- Sélectionnez une année scolaire --</option>
        <?php foreach ($schoolYears as $sy): ?>
            <option value="<?= $sy['id'] ?>"><?= date('Y', strtotime($sy['start_date'])) . ' - ' . date('Y', strtotime($sy['end_date'])) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="class">Classe :</label>
    <select name="class" id="class" onchange="this.form.submit()">
        <option value="">-- Sélectionnez une classe --</option>
        <?php foreach ($classes as $class): ?>
            <option value="<?= $class['id'] ?>" <?= $class['id'] == $classId ? 'selected' : '' ?>><?= $class['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="module">Module :</label>
    <select name="module" id="module" onchange="this.form.submit()">
        <option value="">-- Sélectionnez un module --</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?= $module['id'] ?>" <?= $module['id'] == $moduleId ? 'selected' : '' ?>><?= $module['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="trainer">Formateur :</label>
    <select name="trainer" id="trainer" onchange="this.form.submit()">
        <option value="">-- Sélectionnez un formateur --</option>
        <?php foreach ($trainers as $trainer): ?>
            <option value="<?= $trainer['id'] ?>" <?= $trainer['id'] == $trainerId ? 'selected' : '' ?>><?= $trainer['name'] ?></option>
        <?php endforeach; ?>
    </select>
</form>
